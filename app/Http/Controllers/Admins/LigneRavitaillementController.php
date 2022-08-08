<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\LigneRavitaillement;
use App\Models\Fournisseur;
use App\Models\Ravitaillement;
use DB;

class LigneRavitaillementController extends Controller
{
    public function delete(Request $request, LigneRavitaillement $ligneravitaillement){
        $produits_id = $ligneravitaillement->produits_id;
        $produit = Produit::find($produits_id);
        $qtte_avant_supp = $produit->qtte_stock;
        $quantite = $ligneravitaillement->quantite;
        $qtte_apres_suppression = $qtte_avant_supp - $quantite ;
        $produit->qtte_stock = $qtte_apres_suppression;
        $produit->save();
        $ligneravitaillement->delete();
        $ravitaillements_id = $ligneravitaillement->ravitaillements_id;
        $ravitaillements = Ravitaillement::find($ravitaillements_id);
        $fournisseurs = Fournisseur::find($ravitaillements->fournisseurs_id);
        $produits = Produit::all();
        
            $prix_total = LigneRavitaillement::select(DB::raw('sum(prix_total) as total'))->where('ravitaillements_id', '=', $ravitaillements_id)->first();
            $value = $prix_total->total;
            $ligneravitaillements = LigneRavitaillement::where('ravitaillements_id', $ravitaillements_id)->get();
          
            return view('admins.purchase',compact('fournisseurs','produits','ravitaillements','ligneravitaillements','value'));
    }
}
