<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
        $commandes = Commande::all();
        $lignecommandes = LigneCommande::all();
            return view('admins.commandes',compact('commandes', 'lignecommandes')); 
        }

    public function delete(Commande $commande){
        $commande->delete();
        return back()->with("successDelete", "La commande supprimée avec succès!");
    }

    public function create() {
        $commandes = Commande::all();
        return view('admins.createCommande',compact('commandes'));
    }

    public function store(){
        /* $request->validate([
            "date"=>"required",
            "users_id"=>"required",
        ]); */
        //dd($id);
        $date = now()->toDateString('d-m-Y');
        //dd($date);
        $commandes = new Commande();
        $commandes->users_id=Auth::user()->id;
        $commandes->date=$date;
        //dd($commandes);
        $commandes->save();
        //dd($commandes);

        //Commande::create($request->all());
        return redirect('/admins/commandeProduits')->with("success", "Commande ajoutée avec succès!");
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
