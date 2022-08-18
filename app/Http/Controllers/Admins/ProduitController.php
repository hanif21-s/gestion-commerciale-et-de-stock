<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Taxe;
use App\Models\Remise;
use App\Models\Fournisseur;
use App\Models\LigneCommande;
use App\Models\Commande;
use DB;

class ProduitController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $produits = Produit::all();
        //dd($produits);
        return view('admins.produits',compact('produits'));
    }

    /* public function index1(Request $request) {
        $commandes_id = Commande::all()->last()->id;
        $commandes = Commande::whereId($commandes_id);
        $lignecommandes = LigneCommande::where('commandes_id', $commandes_id)->get();
        $produits = Produit::all();
        return view('admins.commandeProduits',compact('lignecommandes','produits','commandes_id'));
    } */

    public function create() {
    $categories = Categorie::all();
        return view('admins.createProduit',compact('categories'));
    }

    public function create1($id) {
        $commandes = Commande::all();
        //$produits = Produit::all();
        $produits = Produit::find($id);
        return view('admins.createCommandeProduits', compact('commandes', 'produits'));
        }

    public function edit(Produit $produit) {
        $categories = Categorie::all();
        return view('admins.editProduit',compact('produit','categories'));
    }

    public function store(Request $request){
        $request->validate([
            "nom"=>"required",
            "qtte_stock"=>"required",
            "prix_HT"=>"required",
            "stock_minimum"=>"required",
            "date_peremption"=>"required",
            "categories_id"=>"required",
        ]);
        Produit::create($request->all());
        return redirect('/admins/produits')->with("success", "Produit ajouté avec succès!");
    }

     public function update(Request $request, Produit $produit){
        $request->validate([
            "nom"=>"required",
            "qtte_stock"=>"required",
            "prix_HT"=>"required",
            "stock_minimum"=>"required",
            "date_peremption"=>"required",
            "categories_id"=>"required",
        ]);

        $produit->update($request->all());
        return redirect('/admins/produits')->with("success", "Produit mis à jour avec succès!");
    }

    public function delete(Produit $produit){
        $nom_complet = $produit->nom;
        $produit->delete();
        return back()->with("successDelete", "Le Produit '$nom_complet' supprimé avec succès!");
    }
}
