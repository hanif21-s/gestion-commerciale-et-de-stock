<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ravitaillement;
use App\Models\Produit;
use DB;

class RavitaillementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
    $ravitaillements = Ravitaillement::all();
        return view('admins.ravitaillements',compact('ravitaillements'));
    }

    public function create() {
    $produits = Produit::all();
        return view('admins.createRavitaillement',compact('produits'));
    }

    public function edit(Ravitaillement $ravitaillement) {
        $produits = Produit::all();
        return view('admins.editRavitaillement',compact('ravitaillement', "produits"));
    }

    public function store(Request $request){
        $ravitaillements = Ravitaillement::all();
        $produits = Produit::all();

        $request->validate([
            "quantite"=>"required",
            "date"=>"required",
            "produits_id"=>"required",
        ]);

        $data = Ravitaillement::create($request->all());
        //dd($data);
        $id = DB::table('produits')
            ->select('produits.*')
            ->first();
        //dd($id);
            $qtte = $id->qtte_stock;
        //dd($qtte);
         $stockupdate = DB::table('produits')
            ->join('ravitaillements', 'ravitaillements.produits_id', '=' ,'produits.id')
            ->select( 'produits.*')
            ->where([
                ['ravitaillements.produits_id', '=', $data->produits_id],
            ])
            ->first();
            // dd($stockupdate);
            $qtts = $stockupdate->qtte_stock;
            //dd($qtts);
            $qttv = $data->quantite;
            //dd($qttv);
            $QuantiteStock = $qtts + $qttv;
            //dd($QuantiteStock);
         $produit = Produit::find($stockupdate->id);
         $produit->qtte_stock = $QuantiteStock;
         $produit->save();
        return redirect('/admins/ravitaillements')->with("success", "Ravitaillement ajouté avec succès!");
    }

     public function update(Request $request, Ravitaillement $ravitaillement){
        $request->validate([
            "quantite"=>"required",
            "date"=>"required",
            "produits_id"=>"required",
        ]);
        $ravitaillement->update($request->all());
        return redirect('/admins/ravitaillements')->with("success", "Ravitaillement mis à jour avec succès!");
    }

    public function delete(ravitaillement $ravitaillement){
        $nom_complet = $ravitaillement->date;
        $ravitaillement->delete();
        return back()->with("successDelete", "Le ravitaillement du '$nom_complet' supprimé avec succès!");
    }
}
