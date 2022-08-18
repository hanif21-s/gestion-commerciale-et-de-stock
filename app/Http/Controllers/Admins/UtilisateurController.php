<?php

namespace App\Http\Controllers\Admins;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $users = User::all();
            return view('admins.utilisateurs',compact('users'));
        }

        public function create() {

            $roles = Role::all();
            return view('admins.createUtilisateur',compact('roles'));
        }

        public function edit(User $utilisateur) {
            $roles = Role::all();
            return view('admins.editUtilisateur',compact('utilisateur','roles'));
        }

        public function store(Request $request){
            $request->validate([
                "name"=>"required",
                "email"=>"required",
                "password"=>"required",
                "tel"=>"required",
                "adresse"=>"required",
                "sexe"=>"required",
                "role_id"=>"required"

            ]);
            $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tel = $request->tel;
        $user->adresse = $request->adresse;
        $user->sexe = $request->sexe;
            $roleId = $request->role_id;

            $role = Role::find($roleId);
            $user->assignRole([$role]);
           // User::create($request->all());
           $user->save();
            return redirect('/admins/utilisateurs')->with("success", "Utilisateur ajouté avec succès!");
        }

         public function update(Request $request, User $utilisateur){
            $request->validate([
                "name"=>"required",
                "email"=>"required",
                "tel"=>"required",
                "adresse"=>"required",
                "sexe"=>"required",
            ]);
            $utilisateur->update($request->all());
            $utilisateur->syncRoles($request->roles);
            return redirect('/admins/utilisateurs')->with("success", "Utilisateur mis à jour avec succès!");
        }

       public function delete(User $utilisateur){
            $nom_complet = $utilisateur->name;
            $utilisateur->delete();
            return back()->with("successDelete", "L'utilisateur '$nom_complet' supprimé avec succès!");
        }
}
