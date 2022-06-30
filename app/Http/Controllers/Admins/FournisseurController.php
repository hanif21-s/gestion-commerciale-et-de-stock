<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fournisseur;

class FournisseurController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $fournisseurs = Fournisseur::all();
            return view('admins.fournisseurs',compact('fournisseurs'));
        }

        public function delete(Fournisseur $fournisseur){
            $nom_complet = $fournisseur->societe;
            $fournisseur->delete();
            return back()->with("successDelete", "Le fournisseur '$nom_complet' supprimé avec succès!");
        }
    
        public function create() {
            return view('admins.createFournisseur');
        }
    
        public function store(Request $request){
            $request->validate([
                "societe"=>"required",
                "adresse"=>"required",
                "code_postal"=>"required",
                "ville"=>"required",
                "pays"=>"required",
                "tel"=>"required",
                "email"=>"required",
            ]);
    
            Fournisseur::create($request->all());
            return redirect('/admins/fournisseurs')->with("success", "Fournisseur ajouté avec succès!");
        }
    
        public function edit(Fournisseur $fournisseur) {
            return view('admins.editFournisseur',compact('fournisseur'));
        }
    
        public function update(Request $request, Fournisseur $fournisseur){
            $request->validate([
                "societe"=>"required",
                "adresse"=>"required",
                "code_postal"=>"required",
                "ville"=>"required",
                "pays"=>"required",
                "tel"=>"required",
                "email"=>"required",
            ]);
            $fournisseur->update($request->all());
            return redirect('/admins/fournisseurs')->with("success", "Fournisseur mis à jour avec succès!");
        }
}
