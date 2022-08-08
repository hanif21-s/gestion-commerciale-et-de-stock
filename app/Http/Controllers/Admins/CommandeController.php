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
use Illuminate\Support\Facades\Auth;
use DB;


class CommandeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $commandes = Commande::all();
        $clients = Client::all();
        $lignecommandes = LigneCommande::all();
            return view('admins.commandes',compact('commandes', 'lignecommandes', 'clients')); 
        }

    public function delete(Commande $commande){
        $commande->delete();
        return back()->with("successDelete", "La commande supprimée avec succès!");
    }

    public function delete1(Commande $commande){
        $commande->delete();
        return redirect('/admins/clients')->with("success", "Commande annulée");
    }

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
    
    public function create($client) {
        $clients = Client::find($client);
        $produits = Produit::all();
        $date = now()->toDateString('d-m-Y');
        $commandes = new Commande();
        $commandes->users_id=Auth::user()->id;
        $commandes->date=$date;
        $commandes->clients_id = $client;
        $commandes->save();
       
       
        //return view('admins.createCommande',compact('commandes'));
        return view('admins.ventes',compact('clients','produits', 'commandes'));
    }


    public function store(Request $request, $commande){
        $remises = Remise::all();
        $reglements = Reglement::all();
        $commandes = Commande::find($commande);
        $clients = Client::find($commandes->clients_id);
        $produits = Produit::all();
        $produit = Produit::find($request->input('produits_id'));
        $lignecommandes = new LigneCommande();
        $lignecommandes->produits_id = $request->input('produits_id');
        $lignecommandes->quantite = $request->input('quantite');
        $lignecommandes->commandes_id = $commande;
        $lignecommandetotal=($produit->prix_HT + $lignecommandes->prix_total)*$lignecommandes->quantite;
        $qtte_stock = $produit->qtte_stock;
        if($lignecommandes->quantite > $produit->qtte_stock){
            return back()->withErrors([
                'message' => 'Ajout de la ligne de commande impossible ! Quantité du produit en stock insuffisant']);
        }
        else if($lignecommandes->quantite <= $produit->qtte_stock){
            $stock_nv = $qtte_stock - $lignecommandes->quantite;
            $produit = Produit::find($request->input('produits_id'));
            $produit->qtte_stock = $stock_nv;
            $produit->save();
            $lignecommandes->prix_total=$lignecommandetotal;
            $lignecommandes->save();
            $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commande)->first();
            $value = $prix_total->total;
            $tva=$value*0.18;
            $ttc=$value+$tva;
            $lignecommandes = LigneCommande::where('commandes_id', $commande)->get();
          
            return view('admins.sale',compact('clients','produits','commandes','lignecommandes','value','tva','ttc','remises','reglements'));
        }
        //dd($commandes);

        //Commande::create($request->all());
        //return redirect('/admins/commandeProduits')->with("success", "Commande ajoutée avec succès!");
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
}
