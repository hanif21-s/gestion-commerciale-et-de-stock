<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;

class CommandeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $commandes = Commande::all();
            return view('admins.commandes',compact('commandes'));
        }

    public function delete(Commande $commande){
        $commande->delete();
        return back()->with("successDelete", "La commande supprimée avec succès!");
    }

    public function create() {
        return view('admins.createCommande');
    }

    public function store(Request $request){
        $request->validate([
            "date"=>"required",
            "users_id"=>"required",
        ]);

        Commande::create($request->all());
        return redirect('/admins/commandes')->with("success", "Commande ajoutée avec succès!");
    }

    public function edit(Commande $commande) {
        return view('admins.editCommande',compact('commande'));
    }

    public function update(Request $request, Commande $commande){
        $request->validate([
            "date"=>"required",
            "users_id"=>"required",
        ]);
        $commande->update($request->all());
        return redirect('/admins/commandes')->with("success", "Commande mise à jour avec succès!");
    }
}
