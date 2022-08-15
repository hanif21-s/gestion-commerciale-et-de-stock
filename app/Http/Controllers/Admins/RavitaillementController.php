<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ravitaillement;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\LigneRavitaillement;
use DB;
use Illuminate\Support\Facades\Auth;

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

    public function create() {
        $fournisseurs = Fournisseur::all();
        $produits = Produit::all();
        return view('admins.createRavitaillement',compact('produits', 'fournisseurs'));
    }

    public function store(Request $request){
        $date = $request->input('date');
        $fournisseurs_id = $request->input('fournisseur');
        $decharge = $request->input('decharge');
        $all_detail_added = $request->input('all_detail_added');

        $ravitaillements = new Ravitaillement();
        $ravitaillements->date = $date;
        $ravitaillements->users_id = Auth::user()->id;
        $ravitaillements->fournisseurs_id = $fournisseurs_id;
        $ravitaillements->decharge = $decharge;

        $r = str_replace("###", "", $all_detail_added) . '+';
        $e = explode("*+", $r)[0];
        $all_data = explode("*", $e);
        for ($i = 0; $i < sizeof($all_data); $i++){
            $final_selected_value = explode(";;;", $all_data[$i]);
            $produit = Produit::find($final_selected_value[0]);
            $ligneravitaillements = new LigneRavitaillement();
            $ligneravitaillements->produits_id = $produit->id;
            $ligneravitaillements->prix = $final_selected_value[1];
            $ligneravitaillements->quantite = $final_selected_value[2];
            $ligneravitaillements->prix_total = $final_selected_value[1] * $final_selected_value[2];
            $qtte_stock = $produit->qtte_stock;
            $stock_nv = $qtte_stock + $ligneravitaillements->quantite;
            $produit->qtte_stock = $stock_nv;
            $produit->save();
            $ravitaillements->save();
            $ligneravitaillements->ravitaillements_id = $ravitaillements->id;
            $ligneravitaillements->save();
            $prix_total = LigneRavitaillement::select(DB::raw('sum(prix_total) as total'))->where('ravitaillements_id', '=', $ravitaillements->id)->first();
            $value = $prix_total->total;
            Ravitaillement::where('id',$ravitaillements->id)->update(array('total_TTC' => $value));
            if ($i == sizeof($all_data) - 1) {
                return 'ok';
            }
        }
    }

    public function delete(Ravitaillement $ravitaillement){
        $ravitaillements_id = $ravitaillement->id;
        $ligneravitaillements = LigneRavitaillement::where('ravitaillements_id', $ravitaillements_id)->get();
        $ligneravitaillements->each->delete();
        $ravitaillement->delete();
        return back()->with("success", "Suppression effectuée avec succès avec succès!");
    }

    public function view(Ravitaillement $ravitaillement){
        $ligneravitaillements=LigneRavitaillement::where('ravitaillements_id',$ravitaillement->id)->get();
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($ravitaillement->total_TTC);
        return view('admins.viewRavitaillement', compact('ravitaillement', 'ligneravitaillements', 'prix_lettre'));
    }
}
