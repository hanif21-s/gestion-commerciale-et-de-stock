<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ravitaillement;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\LigneRavitaillement;
use DB;

class RavitaillementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
    $ravitaillements = Ravitaillement::all();
    $fournisseurs = Fournisseur::all();
        return view('admins.ravitaillements',compact('ravitaillements','fournisseurs'));
    }

    public function create($fournisseur) {
    $fournisseurs = Fournisseur::find($fournisseur);
    $produits = Produit::all();
    $ravitaillements = new Ravitaillement();
    $ravitaillements->date = now()->toDateString('d-m-Y');
    $ravitaillements->fournisseurs_id = $fournisseur;
    $ravitaillements->save();
        return view('admins.achats',compact('produits','ravitaillements', 'fournisseurs'));
    }

    public function edit(Ravitaillement $ravitaillement) {
        $produits = Produit::all();
        return view('admins.editRavitaillement',compact('ravitaillement', "produits"));
    }

    public function store(Request $request, $ravitaillement){
        $ravitaillements = Ravitaillement::find($ravitaillement);
        $fournisseurs = Fournisseur::find($ravitaillements->fournisseurs_id);
        $produits = Produit::all();
        $produit = Produit::find($request->input('produits_id'));
        $ligneravitaillements = new LigneRavitaillement();
        $ligneravitaillements->produits_id = $request->input('produits_id');
        $ligneravitaillements->quantite = $request->input('quantite');
        $ligneravitaillements->ravitaillements_id = $ravitaillement;
        $ligneravitaillementtotal=($produit->prix_achat + $ligneravitaillements->prix_total)*$ligneravitaillements->quantite;
        $qtte_stock = $produit->qtte_stock;
        $stock_nv = $qtte_stock + $ligneravitaillements->quantite;
        $produit->qtte_stock = $stock_nv;
        $produit->save();
        $ligneravitaillements->prix_total=$ligneravitaillementtotal;
        $ligneravitaillements->save();
        $prix_total = LigneRavitaillement::select(DB::raw('sum(prix_total) as total'))->where('ravitaillements_id', '=', $ravitaillement)->first();
        $value = $prix_total->total;
        $ligneravitaillements = LigneRavitaillement::where('ravitaillements_id', $ravitaillement)->get();
        return view('admins.purchase',compact('fournisseurs','produits','ravitaillements','ligneravitaillements','value'));
    }

     public function update(Request $request, Ravitaillement $ravitaillement){
        $ravitaillements = Ravitaillement::all();
        $produits = Produit::all();
        $quantiteini = $ravitaillement->quantite;
        //dd($quantiteini);
        $request->validate([
            "quantite"=>"required",
            "date"=>"required",
            "produits_id"=>"required",
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
            ->join('ravitaillements', 'ravitaillements.produits_id', '=' ,'produits.id')
            ->select( 'produits.*')
            ->where([
                ['ravitaillements.produits_id', '=', $produitrens],
            ])
            ->first();
            //dd($stockupdate);
        $qtts = $stockupdate->qtte_stock;
            //dd($qtts);
        $qttreset = $qtts - $quantiteini;
            //dd($qttreset);
        $QuantiteStock = $qttreset + $quantitemodi;
            //dd($QuantiteStock);
        $produit = Produit::find($stockupdate->id);
        $produit->qtte_stock = $QuantiteStock;
        $produit->save();
        $ravitaillement->update($request->all());
        return redirect('/admins/ravitaillements')->with("success", "Ravitaillement mis à jour avec succès!");
    }

    public function delete(ravitaillement $ravitaillement){
        $nom_complet = $ravitaillement->date;
        $ravitaillement->delete();
        return back()->with("successDelete", "Le ravitaillement du '$nom_complet' supprimé avec succès!");
    }
    public function delete1(ravitaillement $ravitaillement){
        $ravitaillement->delete();
        return redirect('/admins/fournisseurs')->with("success", "Ravitaillement annulée");
    }

    public function deleteAll(Ravitaillement $ravitaillements){
        $ravitaillements_id = $ravitaillements->id;
        $ligneravitaillements = LigneRavitaillement::where('ravitaillements_id', $ravitaillements_id)->get();
        $ligneravitaillements->each->delete();
        $ravitaillements->delete();
        return redirect('/admins/fournisseurs')->with("success", "Suppression effectuée avec succès avec succès!");
    }
}
