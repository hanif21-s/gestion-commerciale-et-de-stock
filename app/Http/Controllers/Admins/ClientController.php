<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Reglement;

class ClientController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
    $clients = Client::all();
        return view('admins.clients',compact('clients'));
    }

    public function index1($commandes_id) {
        $last_id_commandes=$commandes_id;
        $clients = Client::all();
        $reglements= Reglement::all();
            return view('admins.clientFacture',compact('clients','last_id_commandes','reglements'));
        }
    
    public function create() {
        return view('admins.createClient');
    }

    public function edit(Client $client) {
        return view('admins.editClient',compact('client'));
    }

    public function store(Request $request){
        $request->validate([
            "nom"=>"required",
            "prenoms"=>"required",
            "email"=>"required",
            "tel"=>"required",
            "adresse"=>"required",
            "sexe"=>"required",
        ]);
        //dd($id);
        Client::create($request->all());
        //return redirect('/admins/clients')->with("success", "Client(e) ajouté(e) avec succès!");
        return back()->with("success", "Client(e) ajouté(e) avec succès!");
    }

     public function update(Request $request, Client $client){
        $request->validate([
            "nom"=>"required",
            "prenoms"=>"required",
            "email"=>"required",
            "tel"=>"required",
            "adresse"=>"required",
            "sexe"=>"required",
        ]);
        $client->update($request->all());
        return redirect('/admins/clients')->with("success", "Client(e) mis(e) à jour avec succès!");
    }
    
   public function delete(Client $client){
        $nom_complet = $client->NomnomPatient." ".$client->prenoms;
        $client->delete();
        return back()->with("successDelete", "Client(e) '$nom_complet' supprimé(e) avec succès!");
    }
}
