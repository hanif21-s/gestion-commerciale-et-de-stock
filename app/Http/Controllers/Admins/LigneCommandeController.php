<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\Commande;
use App\Models\Produit;
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

    public function delete(LigneCommande $lignecommande){
        $lignecommande->delete();
        return back()->with("successDelete", "La ligne commande supprimée avec succès!");
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
        $lignecommandes->etat = $request->input('etat');
        $lignecommandes->commandes_id =$commandes_id;
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
            $lignecommandes->save();
            return redirect('/admins/commandeProduits')->with("success", "Ligne commande ajoutée avec succès!");
        } 
    }


    public function edit(LigneCommande $lignecommande) {
        $commandes = Commande::all();
        $produits = Produit::all();
        return view('admins.editLigneCommande',compact('lignecommande', "commandes", "produits"));
    }

    public function update(Request $request, LigneCommande $lignecommande){
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
            "etat"=>"required",
        ]);
        $quantitemodi = request('quantite');
        //dd($quantitemodi);
        $produitrens = request('produits_id');
        //dd($produitrens);
        $id = DB::table('produits')
            ->select('produits.*')
            ->first();
        $qtte = $id->qtte_stock;
        //dd($qtte);
        $stockupdate = DB::table('produits')
            ->join('ligne_commandes', 'ligne_commandes.produits_id', '=' ,'produits.id')
            ->select( 'produits.*')
            ->where([
                ['ligne_commandes.produits_id', '=', $produitrens],
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
        return redirect('/admins/commandeProduits')->with("success", "Ligne commande mise à jour avec succès!");
    }
}
