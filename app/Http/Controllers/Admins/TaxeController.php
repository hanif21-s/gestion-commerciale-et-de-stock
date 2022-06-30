<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taxe;

class TaxeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $taxes = Taxe::all();
            return view('admins.taxes',compact('taxes'));
        }

    public function delete(Taxe $taxe){
        $nom_complet = $taxe->libelle;
        $taxe->delete();
        return back()->with("successDelete", "La taxe '$nom_complet' supprimée avec succès!");
    }

    public function create() {
        return view('admins.createTaxe');
    }

    public function store(Request $request){
        $request->validate([
            "libelle"=>"required",
            "taux"=>"required",
        ]);

        Taxe::create($request->all());
        return redirect('/admins/taxes')->with("success", "Taxe ajoutée avec succès!");
    }

    public function edit(Taxe $taxe) {
        return view('admins.editTaxe',compact('taxe'));
    }

    public function update(Request $request, Taxe $taxe){
        $request->validate([
            "libelle"=>"required",
            "taux"=>"required",
        ]);
        $taxe->update($request->all());
        return redirect('/admins/taxes')->with("success", "Taxe mise à jour avec succès!");
    }
}
