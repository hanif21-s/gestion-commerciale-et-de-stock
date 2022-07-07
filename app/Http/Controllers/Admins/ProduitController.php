<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Taxe;
use App\Models\Remise;
use App\Models\Fournisseur;
use DB;

class ProduitController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $produits = Produit::all();
        return view('admins.produits',compact('produits'));
    }

    public function create() {
    $categories = Categorie::all();
    $remises = Remise::all();
    $taxes = Taxe::all();
    $fournisseurs = Fournisseur::all();
        return view('admins.createProduit',compact('categories', 'remises', 'taxes', 'fournisseurs'));
    }

    public function edit(Produit $produit) {
        $categories = Categorie::all();
        $remises = Remise::all();
        $taxes = Taxe::all();
        $fournisseurs = Fournisseur::all();
        return view('admins.editProduit',compact('produit', "categories","remises", "taxes", "fournisseurs"));
    }

    public function store(Request $request){
        $request->validate([
            "nom"=>"required",
            "qtte_stock"=>"required",
            "prix_achat"=>"required",
            "prix_HT"=>"required",
            "stock_minimum"=>"required", 
            "date_peremption"=>"required",
            "benefice"=>"",
            "categories_id"=>"required",
            "taxes_id"=>"required",
            "remises_id"=>"required",
            "fournisseurs_id"=>"required",
        ]);
        Produit::create($request->all());
        return redirect('/admins/produits')->with("success", "Produit ajouté avec succès!");
    }

     public function update(Request $request, Produit $produit){
        $request->validate([
            "nom"=>"required",
            "qtte_stock"=>"required",
            "prix_achat"=>"required",
            "prix_HT"=>"required",
            "stock_minimum"=>"required",
            "date_peremption"=>"required",
            "categories_id"=>"required",
            "taxes_id"=>"required",
            "remises_id"=>"required",
            "fournisseurs_id"=>"required",
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
