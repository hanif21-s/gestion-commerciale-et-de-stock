<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admins\CommandeController;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Client;
use App\Models\Remise;
use App\Models\Reglement;
use DB;

class LigneCommandeController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
    }
    
    public function index() {
        $commandes_id = Commande::all()->last()->id;
        $commandes = Commande::whereId($commandes_id);
        $lignecommandes = LigneCommande::where('commandes_id', $commandes_id)->get();
        //dd($lignecommandes);
        $produits = Produit::all();
            return view('admins.lignecommandes',compact('lignecommandes','produits','commandes'));
        } 

    public function delete(Request $request, LigneCommande $lignecommande){
        $remises = Remise::all();
        $reglements = Reglement::all();
        $produits_id = $lignecommande->produits_id;
        $produit = Produit::find($produits_id);
        $qtte_avant_supp = $produit->qtte_stock;
        $quantite = $lignecommande->quantite;
        $qtte_apres_suppression = $quantite + $qtte_avant_supp;
        $produit->qtte_stock = $qtte_apres_suppression;
        $produit->save();
        $lignecommande->delete();
        $commandes_id = $lignecommande->commandes_id;
        $commandes = Commande::find($commandes_id);
        $clients = Client::find($commandes->clients_id);
        $produits = Produit::all();
        
            $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commandes_id)->first();
            $value = $prix_total->total;
            $tva=$value*0.18;
            $ttc=$value+$tva;
            $lignecommandes = LigneCommande::where('commandes_id', $commandes_id)->get();
          
            return view('admins.sale',compact('clients','produits','commandes','lignecommandes','value','tva','ttc','remises','reglements'));
        
        //dd($clients);
        //return back()->with("successDelete", "La ligne commande supprimée avec succès!");
    } 

    public function create() {
        $commandes = Commande::all();
        $produits = Produit::all();
        return view('admins.createLigneCommande', compact('commandes', 'produits'));
    } 


    public function store(Request $request, $id){
        $commandes = Commande::all();
        $produits = Produit::all();
        $lignecommandes = LigneCommande::all();
        $commandes_id = Commande::all()->last()->id;
        $lignecommandes = new LigneCommande();
        $produits_id = Produit::find($id);
        //dd($produits_id);
        $lignecommandes->produits_id=$id; 
        $lignecommandes->quantite = $request->input('quantite');
        $lignecommandes->commandes_id =$commandes_id;
        $lignecommandetotal=($produits_id->prix_HT + $lignecommandes->prix_total)*$lignecommandes->quantite;
        //dd($id);
        $qtte_stock = $produits_id->qtte_stock;
        //dd($quantite);
        if($lignecommandes->quantite > $produits_id->qtte_stock){
            return back()->withErrors([
                'message' => 'Ajout de la ligne de commande impossible ! Quantité du produit en stock insuffisant']);
        }
        else if($lignecommandes->quantite <= $produits_id->qtte_stock){
            $stock_nv = $qtte_stock - $lignecommandes->quantite;
            //dd($QuantiteStock);
            $produit = Produit::find($id);
            $produit->qtte_stock = $stock_nv;
            $produit->save();
            $lignecommandes->prix_total=$lignecommandetotal;
            $lignecommandes->save();
            return redirect('/admins/commandeProduits')->with("success", "Ligne commande ajoutée avec succès!");
        } 
    }


    public function edit(LigneCommande $lignecommande) {
        //dd($lignecommande->commandes_id);
        $commandes = Commande::all();
        $produits = Produit::all();
        return view('admins.editLigneCommande',compact('lignecommande', "commandes", "produits"));
    }

    public function update(Request $request, LigneCommande $lignecommande){
        //dd($lignecommande->commandes_id);
        $produits = Produit::all();
        $lignecommandes = LigneCommande::all();
        $quantiteini = $lignecommande->quantite;
        //dd($quantiteini);
        $request->validate([
            "produits_id"=>"required",
            "quantite"=>"required",
            "prix_unitaire"=>"",
            "prix_total"=>"",
            "commandes_id"=>"required",
        ]);
        $quantitemodi = request('quantite');
        //dd($quantitemodi);
        $stockupdate = DB::table('produits')
            ->join('ligne_commandes', 'ligne_commandes.produits_id', '=' ,'produits.id')
            ->select( 'produits.*')
            ->where([
                ['ligne_commandes.produits_id', '=', $lignecommande->produits_id],
            ])
            ->first();
        //dd($stockupdate);
        $qtts = $stockupdate->qtte_stock;
            //dd($qtts);
        $qttreset = $qtts + $quantiteini;
            //dd($qttreset);
        $QuantiteStock = $qttreset - $quantitemodi;
            //dd($QuantiteStock);
        $produit = Produit::find($stockupdate->id);
        $produit->qtte_stock = $QuantiteStock;
        $produit->save();
        $lignecommande->update($request->all());
        //return redirect()->route('commandes.ajouter');
        /* return redirect()->action(
            [CommandeController::class, 'store'], ['commande' => $lignecommande->commandes_id]
        ); */
        //return redirect()->action([CommandeController::class, 'store']);
        return back()->with("success", "Ligne commande mise à jour avec succès!");
        //return redirect()->route('commandes.ajouter', [$lignecommande->commandes_id]);
        //return view('admins.sale',compact('produit','lignecommande'));
    }
}
