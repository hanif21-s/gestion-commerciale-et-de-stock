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
use App\Models\Depense;
use App\Models\Billetage;
use DB;
use SUM;

class FactureController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request,Commande $commande){
        $etat = 1;
        $reglement_client = $request->input('reglement_client');
        $total_ttc = $commande->total_TTC;
        $monnaie = $reglement_client - $total_ttc;
        $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commande->id)->first();
        $value = $prix_total->total;
        //dd($monnaie);
        $B_10000 = $request->input('B_10000')*10000;
        $B_5000 = $request->input('B_5000')*5000;
        $B_2000 = $request->input('B_2000')*2000;
        $B_1000 = $request->input('B_1000')*1000;
        $B_500 = $request->input('B_500')*500;
        $P_500 = $request->input('P_500')*500;
        $P_250 = $request->input('P_250')*250;
        $P_200 = $request->input('P_200')*200;
        $P_100 = $request->input('P_100')*100;
        $P_50 = $request->input('P_50')*50;
        $P_25 = $request->input('P_25')*25;
        $P_10 = $request->input('P_10')*10;
        $P_5 = $request->input('P_5')*5;
        $somme_billetage_reglement = $B_10000 + $B_5000 + $B_2000 + $B_1000 + $B_500 + $P_500 + $P_250 + $P_200 + $P_100 + $P_50 + $P_25 + $P_10 + $P_5;
        $MB_10000 = $request->input('MB_10000')*10000;
        $MB_5000 = $request->input('MB_5000')*5000;
        $MB_2000 = $request->input('MB_2000')*2000;
        $MB_1000 = $request->input('MB_1000')*1000;
        $MB_500 = $request->input('MB_500')*500;
        $MP_500 = $request->input('MP_500')*500;
        $MP_250 = $request->input('MP_250')*250;
        $MP_200 = $request->input('MP_200')*200;
        $MP_100 = $request->input('MP_100')*100;
        $MP_50 = $request->input('MP_50')*50;
        $MP_25 = $request->input('MP_25')*25;
        $MP_10 = $request->input('MP_10')*10;
        $MP_5 = $request->input('MP_5')*5;
        $somme_billetage_monnaie = $MB_10000 + $MB_5000 + $MB_2000 + $MB_1000 + $MB_500 + $MP_500 + $MP_250 + $MP_200 + $MP_100 + $MP_50 + $MP_25 + $MP_10 + $MP_5;

        $s10k = Billetage::select(DB::raw('sum(B_10000) as s10k'))->where('type', '=', 1)->first();
        $somme10k = $s10k->s10k;
        $s5k = Billetage::select(DB::raw('sum(B_5000) as s5k'))->where('type', '=', 1)->first();
        $somme5k = $s5k->s5k;
        $s2k = Billetage::select(DB::raw('sum(B_2000) as s2k'))->where('type', '=', 1)->first();
        $somme2k = $s2k->s2k;
        $s1k = Billetage::select(DB::raw('sum(B_1000) as s1k'))->where('type', '=', 1)->first();
        $somme1k = $s1k->s1k;
        $s5b = Billetage::select(DB::raw('sum(B_500) as s5b'))->where('type', '=', 1)->first();
        $somme5b = $s5b->s5b;
        $s5b2 = Billetage::select(DB::raw('sum(P_500) as s5b2'))->where('type', '=', 1)->first();
        $somme5b2 = $s5b2->s5b2;
        $s2b5 = Billetage::select(DB::raw('sum(P_250) as s2b5'))->where('type', '=', 1)->first();
        $somme2b5 = $s2b5->s2b5;
        $s2b = Billetage::select(DB::raw('sum(P_200) as s2b'))->where('type', '=', 1)->first();
        $somme2b = $s2b->s2b;
        $s1b = Billetage::select(DB::raw('sum(P_100) as s1b'))->where('type', '=', 1)->first();
        $somme1b = $s1b->s1b;
        $s50 = Billetage::select(DB::raw('sum(P_50) as s50'))->where('type', '=', 1)->first();
        $somme50 = $s50->s50;
        $s25 = Billetage::select(DB::raw('sum(P_25) as s25'))->where('type', '=', 1)->first();
        $somme25 = $s25->s25;
        $s10 = Billetage::select(DB::raw('sum(P_10) as s10'))->where('type', '=', 1)->first();
        $somme10 = $s10->s10;
        $s5 = Billetage::select(DB::raw('sum(P_5) as s5'))->where('type', '=', 1)->first();
        $somme5 = $s5->s5;
        if($MB_10000 > $somme10k || $MB_5000 > $somme5k || $MB_2000 > $somme2k || $MB_1000 > $somme1k || $MB_500 > $somme5b || $MP_500 > $somme5b2 || $MP_250 > $somme2b5 || $MP_200 > $somme2b ||$MP_100 > $somme1b || $MP_50 > $somme50 || $MP_25 > $somme25 || $MP_10 > $somme10 || $MP_5 > $somme5){
            return back()->withErrors([
                'message' => 'Billet ou pièce insuffisant en caisse']);
        }
        if($reglement_client<$total_ttc){
            return back()->withErrors([
                'message' => 'Le montant du client est insuffisant!']);
        }
        if($somme_billetage_reglement<$reglement_client){
            return back()->withErrors([
                'message' => 'Billetage du reglement insuffisant!']);
        }
        if($somme_billetage_reglement>$reglement_client){
            return back()->withErrors([
                'message' => 'Billetage du reglement en surplus!']);
        }
        if($somme_billetage_monnaie>$monnaie){
            return back()->withErrors([
                'message' => 'Billetage de la monnaie insuffisant!']);
        }
        else{
        Commande::where('id',$commande->id)->update(array('etat' => $etat));
                    Commande::where('id',$commande->id)->update(array('reglement_client' => $reglement_client));
                    $rbil = new Billetage();
                    $rbil->commandes_id = $commande->id;
                    $rbil->type = 1;
                    $rbil->B_10000 = $request->input('B_10000');
                    $rbil->B_5000 = $request->input('B_5000');
                    $rbil->B_2000 = $request->input('B_2000');
                    $rbil->B_1000 = $request->input('B_1000');
                    $rbil->B_500 = $request->input('B_500');
                    $rbil->P_500 = $request->input('P_500');
                    $rbil->P_250 = $request->input('P_250');
                    $rbil->P_200 = $request->input('P_200');
                    $rbil->P_100 = $request->input('P_100');
                    $rbil->P_50 = $request->input('P_50');
                    $rbil->P_25 = $request->input('P_25');
                    $rbil->P_10 = $request->input('P_10');
                    $rbil->P_5 = $request->input('P_5');
                    $rbil->total = $somme_billetage_reglement;
                    $rbil->save();
                    $mbil = new Billetage();
                    $mbil->commandes_id = $commande->id;
                    $mbil->type = 0;
                    $mbil->B_10000 = $request->input('MB_10000');
                    $mbil->B_5000 = $request->input('MB_5000');
                    $mbil->B_2000 = $request->input('MB_2000');
                    $mbil->B_1000 = $request->input('MB_1000');
                    $mbil->B_500 = $request->input('MB_500');
                    $mbil->P_500 = $request->input('MP_500');
                    $mbil->P_250 = $request->input('MP_250');
                    $mbil->P_200 = $request->input('MP_200');
                    $mbil->P_100 = $request->input('MP_100');
                    $mbil->P_50 = $request->input('MP_50');
                    $mbil->P_25 = $request->input('MP_25');
                    $mbil->P_10 = $request->input('MP_10');
                    $mbil->P_5 = $request->input('MP_5');
                    $mbil->total = $somme_billetage_monnaie;
                    $mbil->save();
                    return view('admins.factures',compact('commande','monnaie', 'value', 'reglement_client'));
        }
    }

    public function index1(){
        $commandes = Commande::where('etat', 1)->get();
        return view('admins.allfacture',compact('commandes'));
    }

    public function balance(){
    $date = now()->toDateString('d-m-Y');
    $date_du_jour = date('d/m/Y', strtotime($date));
    $commandes = Commande::where([
        ['date', $date],
        ['etat', 1],
    ])->get();
    $total_journalier = Commande::where([
        ['date', $date],
        ['etat', 1],
    ])->sum('total_TTC');
    return view('admins.bilan', compact('date_du_jour','commandes','total_journalier'));
    }

    public function bilan(Request $request){
        $date = $request->input('date');
        $date_du_jour = date('d/m/Y', strtotime($date));
        $commandes = Commande::where([
            ['date', $date],
            ['etat', 1],
        ])->get();
        $total_journalier = Commande::where([
            ['date', $date],
            ['etat', 1],
        ])->sum('total_TTC');
        return view('admins.bilanjours', compact('date_du_jour','commandes','total_journalier'));
        }


    public function make_random_custom_string($n){

        $alphabet = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $s = "";

        for ($i = 0; $i != $n; ++$i)
            $s .= $alphabet[mt_rand(0, strlen($alphabet) - 1)];

        return $s;
    }

    public function caisse(){
        $date_du_jour = now()->toDateString('Y-m-d');
        $date = date('d/m/Y', strtotime($date_du_jour));
        $entre = DB::table('billetages')
            ->select( DB::raw('sum(total) as total'))
            ->where([
                ['billetages.type', '=', 1],
            ])
            ->first();
        $value1 = $entre->total;
        $sortie = DB::table('billetages')
            ->select( DB::raw('sum(total) as total'))
            ->where([
                ['billetages.type', '=', 0],
            ])
            ->first();
        $value2 = $sortie->total;
        $value = $value1-$value2;
        return view('admins.welcome', compact('date','value'));
    }
}
