<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reglement;

class ReglementController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index($client_id) {

        $client=$client_id;
        $reglements = Reglement::all();
            return view('admins.reglements',compact('reglements','client'));
        }

    public function delete(Reglement $reglement){
        $reglement->delete();
        return back()->with("successDelete", "Le reglement supprimé avec succès!");
    }

    public function create() {
        return view('admins.createReglement');
    }

    public function store(Request $request){
        $request->validate([
            "montant"=>"required",
            "date"=>"required",
            "etat"=>"required",
        ]);

        Reglement::create($request->all());
        return redirect('/admins/reglements')->with("success", "Reglement ajouté avec succès!");
    }

    public function edit(Reglement $reglement) {
        return view('admins.editReglement',compact('reglement'));
    }

    public function update(Request $request, Reglement $reglement){
        $request->validate([
            "montant"=>"required",
            "date"=>"required",
            "etat"=>"required",
        ]);
        $reglement->update($request->all());
        return redirect('/admins/reglements')->with("success", "Reglement mis à jour avec succès!");
    }
}
