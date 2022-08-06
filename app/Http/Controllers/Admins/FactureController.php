<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\Commande;
use App\Models\Reglement;
use App\Models\Client;
use App\Models\Remise;
use App\Models\Facture;

use DB;
use SUM;

class FactureController extends Controller
{

    public function __construct(){
        $this->middleware('auth'); 
    }

    public function index(){
        $factures_id = Facture::all()->last()->id;
        $factures = Facture::where('id', $factures_id)->get();
        //dd($factures);
        $client= Client::all();
        $remises = Remise::all();
        $reglements = Reglement::all();
        return view('admins.factures',compact('factures','remises','client','reglements'));
    }

    public function create(Request $request, $commande){
        $date = now()->toDateString('d-m-Y');
        $factures = new Facture();
        $factures->num_interne=$this->make_random_custom_string(6);
        $factures->date=$date;
        $factures->reglements_id=$request->input('reglements_id');
        $factures->remises_id=$request->input('remises_id');
        $remises_id = Remise::find($request->input('remises_id'));
        $taux_remise = $remises_id->taux;
        $factures->commandes_id=$commande;
        $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commande)->first();
        $value = $prix_total->total;
        $factures->total_HT=$value;
        $factures->tva=$value*0.18;
        $prix_remise = $value * $taux_remise / 100;
        //dd($prix_remise);
        $factures->prix_remise=$prix_remise;
        $factures->total_TTC = $factures->total_HT + $factures->tva - $factures->prix_remise;
        //dd($factures->total_TTC);
        $factures->save();
       
        return redirect('admins/factures')->with("success", "Facture ajoutée avec succès!");
    }


    public function make_random_custom_string($n){

        $alphabet = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $s = "";

        for ($i = 0; $i != $n; ++$i)
            $s .= $alphabet[mt_rand(0, strlen($alphabet) - 1)];

        return $s;
    }
}
