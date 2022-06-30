<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Remise;

class RemiseController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $remises = Remise::all();
            return view('admins.remises',compact('remises'));
        }

    public function delete(Remise $remise){
        $nom_complet = $remise->libelle;
        $remise->delete();
        return back()->with("successDelete", "La remise '$nom_complet' supprimée avec succès!");
    }

    public function create() {
        return view('admins.createRemise');
    }

    public function store(Request $request){
        $request->validate([
            "libelle"=>"required",
            "taux"=>"required",
        ]);

        Remise::create($request->all());
        return redirect('/admins/remises')->with("success", "Remise ajoutée avec succès!");
    }

    public function edit(Remise $remise) {
        return view('admins.editRemise',compact('remise'));
    }

    public function update(Request $request, Remise $remise){
        $request->validate([
            "libelle"=>"required",
            "taux"=>"required",
        ]);
        $remise->update($request->all());
        return redirect('/admins/remises')->with("success", "Remise mise à jour avec succès!");
    }
}
