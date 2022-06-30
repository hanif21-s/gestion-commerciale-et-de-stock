<?php

namespace App\Http\Controllers\Admins;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
    $users = User::all();
        return view('admins.utilisateurs',compact('users'));
    }

    public function delete(User $utilisateur){
        $nom_complet = $utilisateur->name;
        $utilisateur->delete();
        return back()->with("successDelete", "L'Utilisateur '$nom_complet' supprimé avec succès!");
    }

    public function create() {
        return view('admins.createUtilisateur');
    }

    public function store(Request $request){
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "is_admin"=>"required",
            "is_gerant"=>"required",
            "is_commercial"=>"required",
            "is_caissier"=>"required",
            "password"=>"required",
            "tel"=>"required",
            "adresse"=>"required",
            "sexe"=>"required",
        ]);

        User::create($request->all());
        return redirect('/admins/utilisateurs')->with("success", "Utilisateur ajouté avec succès!");
    }

    public function edit(User $utilisateur) {
        return view('admins.editUtilisateur',compact('utilisateur'));
    }

    public function update(Request $request, User $utilisateur){
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "is_admin"=>"required",
            "is_gerant"=>"required",
            "is_commercial"=>"required",
            "is_caissier"=>"required",
            "password"=>"required",
            "tel"=>"required",
            "adresse"=>"required",
            "sexe"=>"required",
        ]);

        $utilisateur->update($request->all());
        return redirect('/admins/utilisateurs')->with("success", "Utilisateur mis à jour avec succès!");
    }
}
