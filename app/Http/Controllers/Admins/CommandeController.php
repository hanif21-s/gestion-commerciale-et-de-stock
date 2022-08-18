<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\User;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Remise;
use App\Models\Reglement;
use App\Models\Facture;
use App\Models\Billetage;
use Illuminate\Support\Facades\Auth;
use DB;


class CommandeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $commandes = Commande::where('etat', 0)->get();
        $clients = Client::all();
        $lignecommandes = LigneCommande::all();
            return view('admins.commandes',compact('commandes', 'lignecommandes', 'clients'));
    }

    public function index2() {
        $commandes = Commande::where('etat', 1)->get();
        $clients = Client::all();
        $lignecommandes = LigneCommande::all();
            return view('admins.commandes',compact('commandes', 'lignecommandes', 'clients'));
    }

    public function delete(Commande $commande){
        $commandes_id = $commande->id;
        $num_interne = $commande->num_interne;
        $lignecommandes = LigneCommande::where('commandes_id', $commandes_id)->get();
        $lignecommandes->each->delete();
        $commande->delete();
        return back()->with("successDelete", "Commande '$num_interne' supprimée avec succès!");
    }

    /* public function delete1(Commande $commande){
        $commande->delete();
        return redirect('/admins/clients')->with("success", "Commande annulée");
    } */

    public function deleteAll(Commande $commandes){
        $commandes_id = $commandes->id;
        $lignecommandes = LigneCommande::where('commandes_id', $commandes_id)->get();
        /* $produits_id = $lignecommandes->pluck('produits_id');
        $produit = Produit::find($produits_id);
        $qtte_avant_suppression = $produit->pluck('qtte_stock');
        $quantite = $lignecommandes->pluck('quantite');
        dd($produits_id); */
        $lignecommandes->each->delete();
        $commandes->delete();
        return redirect('/admins/clients')->with("success", "Suppression effectuée avec succès avec succès!");
        //return back()->with("successDelete", "La commande supprimée avec succès!");
    }

    public function edit(Commande $commande) {
        $clients = Client::all();
        return view('admins.editCommande',compact('commande','clients'));
    }

    public function update(Request $request, Commande $commande){
        $request->validate([
            "date"=>"required",
            "users_id"=>"required",
        ]);
        $commande->update($request->all());
        return redirect('/admins/commandes')->with("success", "Commande mise à jour avec succès!");
    }

    public function create(){
        $clients = Client::all();
        $produits = Produit::all();
        $remises = Remise::all();
        $reglements = Reglement::all();
        $lignecommandes = LigneCommande::all();
        return view('admins.createCommande', compact('clients', 'produits', 'lignecommandes','remises','reglements'));
    }

    public function store(Request $request){
        $date = $request->input('date');
        $clients_id = $request->input('client');
        $remises_id = $request->input('remise');
        $reglements_id = $request->input('reglement');
        $all_detail_added = $request->input('all_detail_added');

        //commande create
        $commandes = new Commande();
        $commandes->num_interne=$this->make_random_custom_string(6);
        $commandes->date = $date;
        $commandes->users_id = Auth::user()->id;
        $commandes->clients_id = $clients_id;
        $commandes->remises_id = $remises_id;
        $remise = Remise::find($remises_id);
        $taux_remise = $remise->taux;
        $commandes->reglements_id = $reglements_id;
        $commandes->etat = 0;
         if($commandes->date <= now()->toDateString('d-m-Y') ){
            $r = str_replace("###", "", $all_detail_added) . '+';
            $e = explode("*+", $r)[0];
            $all_data = explode("*", $e);
            for ($i = 0; $i < sizeof($all_data); $i++){
                $final_selected_value = explode(";;;", $all_data[$i]);
                $produit = Produit::find($final_selected_value[0]);
                $prix_unitaire = $produit->prix_HT;
                $lignecommandes = new LigneCommande();
                $lignecommandes->produits_id = $produit->id;
                $lignecommandes->quantite = $final_selected_value[1];
                $lignecommandes->prix_total = $prix_unitaire * $final_selected_value[1];
                $qtte_stock = $produit->qtte_stock;
                if($lignecommandes->quantite > $qtte_stock){
                    return 'no';
                }
                else if($lignecommandes->quantite <= $qtte_stock){
                    $stock_nv = $qtte_stock - $lignecommandes->quantite;
                    //$produit = Produit::find($final_selected_value[0]);
                    $produit->qtte_stock = $stock_nv;
                    $produit->save();
                    $commandes->save();
                    $lignecommandes->commandes_id = $commandes->id;
                    $lignecommandes->save();
                    $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commandes->id)->first();
                    $value = $prix_total->total;
                    $prix_tva=$value*0.18;
                    $prix_remise = $value * $taux_remise / 100;
                    $total_TTC = $value + $prix_tva - $prix_remise;
                    Commande::where('id',$commandes->id)->update(array('prix_remise' => $prix_remise));
                    Commande::where('id',$commandes->id)->update(array('tva' => $prix_tva));
                    Commande::where('id',$commandes->id)->update(array('total_TTC' => $total_TTC));
                    if ($i == sizeof($all_data) - 1) {
                        return 'ok';
                    }
                }

            }
         }
    }

    public function view(Commande $commande){
        $remises_id = $commande->remises_id;
        $remise = Remise::find($remises_id);
        $taux_remise = $remise->taux;
        $date_du_jour = $commande->date;
        $date = date('d/m/Y', strtotime($date_du_jour));
        $lignecommandes=LigneCommande::where('commandes_id',$commande->id)->get();
        $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commande->id)->first();
        $value = $prix_total->total;
        $prix_remise = $value * $taux_remise / 100;
        $prix_taxe = $value * 18/100;
        $total_ttc = $value + $prix_taxe;
        $remises = Remise::all();
        $reglements = Reglement::all();
        return view('admins.viewCommande', compact('prix_remise','date','commande','lignecommandes','value','prix_taxe','total_ttc','remises','reglements'));
    }



    public function make_random_custom_string($n){

        $alphabet = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $s = "";

        for ($i = 0; $i != $n; ++$i)
            $s .= $alphabet[mt_rand(0, strlen($alphabet) - 1)];

        return $s;
    }
}
