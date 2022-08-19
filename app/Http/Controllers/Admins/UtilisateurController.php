<?php

namespace App\Http\Controllers\Admins;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

        public function edit2() {
            $id = Auth::user()->id;
            $utilisateur = User::where('id', $id)->first();
            return view('admins.editUtilisateur2',compact('utilisateur'));
        }

        public function update2(Request $request){
            $name = $request->input('name');
            $email = $request->input('email');
            $adresse = $request->input('adresse');
            $tel = $request->input('tel');
            $ancien_mdp = $request->input('ancien_mdp');
            $nvo_mdp = $request->input('nvo_mdp');
            $nvo_mdp_hash = Hash::make($nvo_mdp);
            $conf_nvo_mdp = $request->input('conf_nvo_mdp');

            $id = Auth::user()->id;
            $utilisateur = User::where('id', $id)->first();
            if($ancien_mdp != $utilisateur->mdp){
                return back()->withErrors([
                    'message' => 'ancien mot de passe incorrect']);
            }
            if($nvo_mdp == $utilisateur->mdp){
                return back()->withErrors([
                    'message' => 'Nouveau mot de passe identique à l'/'ancien']);
            }
            if($nvo_mdp != $conf_nvo_mdp){
                return back()->withErrors([
                    'message' => 'Mots de passe non identiques']);
            }
            else{
                User::where('id',$id)->update(array('name' => $name));
                User::where('id',$id)->update(array('email' => $email));
                User::where('id',$id)->update(array('adresse' => $adresse));
                User::where('id',$id)->update(array('tel' => $tel));
                User::where('id',$id)->update(array('mdp' => $nvo_mdp));
                User::where('id',$id)->update(array('password' => $nvo_mdp_hash));
                return redirect('/accueil')->with("success", "Profil modifié avec succès!");
            }
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
        $user->mdp = $request->password;
        $user->password = Hash::make($request->password);
        $user->tel = $request->tel;
        $user->adresse = $request->adresse;
        $user->sexe = $request->sexe;
            $roleId = $request->role_id;

            $role = Role::find($roleId);
            $user->assignRole([$role]);
            $confirmation = $request->password_confirmation;
            if($confirmation != $user->mdp){
                return back()->withErrors([
                    'message' => 'les mots de passe entrés ne sont pas identiques']);
            }else{
                $user->save();
            return redirect('/admins/utilisateurs')->with("success", "Utilisateur ajouté avec succès!");
            }
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
