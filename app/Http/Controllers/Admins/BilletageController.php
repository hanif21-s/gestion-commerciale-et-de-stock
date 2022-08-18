<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Depense;
use App\Models\Billetage;
use DB;

class BilletageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('admins.billetage');
    }

    public function resultat(Request $request){
        $B_10000 = $request->input('B_10000');
        $B_5000 = $request->input('B_5000');
        $B_2000 = $request->input('B_2000');
        $B_1000 = $request->input('B_1000');
        $B_500 = $request->input('B_500');
        $P_500 = $request->input('P_500');
        $P_250 = $request->input('P_250');
        $P_200 = $request->input('P_200');
        $P_100 = $request->input('P_100');
        $P_50 = $request->input('P_50');
        $P_25 = $request->input('P_25');
        $P_10 = $request->input('P_10');
        $P_5 = $request->input('P_5');

        $date_du_jour = now()->toDateString('d-m-Y');
        $date = date('Y-m-d');
        //Requetes Billetage where Type = 1 (Commande)
        $billet_10000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('B_10000');

        $billet_5000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('B_5000');

        $billet_2000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('B_2000');

        $billet_1000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('B_1000');

        $billet_500 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('B_500');

        $piece_500 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_500');

        $piece_250 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_250');

        $piece_200 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_200');

        $piece_100 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_100');

        $piece_50 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_50');

        $piece_25 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_25');

        $piece_10 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_10');

        $piece_5 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 1],
        ])->sum('P_5');

        //Requetes Billetage where Type = 0 (Depense)
        $Dbillet_10000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('B_10000');

        $Dbillet_5000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('B_5000');

        $Dbillet_2000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('B_2000');

        $Dbillet_1000 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('B_1000');

        $Dbillet_500 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('B_500');

        $Dpiece_500 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_500');

        $Dpiece_250 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_250');

        $Dpiece_200 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_200');

        $Dpiece_100 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_100');

        $Dpiece_50 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_50');

        $Dpiece_25 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_25');

        $Dpiece_10 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_10');

        $Dpiece_5 = Billetage::where([
            ['created_at', 'LIKE', '%'.$date.'%'],
            ['type', 0],
        ])->sum('P_5');

        //Requete Billetage en caisse
        $blt_10000 = $billet_10000 - $Dbillet_10000;
        $blt_5000 = $billet_5000 - $Dbillet_5000;
        $blt_2000 = $billet_2000 - $Dbillet_2000;
        $blt_1000 = $billet_1000 - $Dbillet_1000;
        $blt_500 = $billet_500 - $Dbillet_500;
        $pie_500 = $piece_500 - $Dpiece_500;
        $pie_250 = $piece_250 - $Dpiece_250;
        $pie_200 = $piece_200 - $Dpiece_200;
        $pie_100 = $piece_100 - $Dpiece_100;
        $pie_50 = $piece_50 - $Dpiece_50;
        $pie_25 = $piece_25 - $Dpiece_25;
        $pie_10 = $piece_10 - $Dpiece_10;
        $pie_5 = $piece_5 - $Dpiece_5;

        if($B_10000 == $blt_10000 && $B_5000 == $blt_5000 && $B_2000 == $blt_2000 && $B_1000 == $blt_1000 && $B_500 == $blt_500 && $P_500 == $pie_500 && $P_250 == $pie_250 && $P_200 == $pie_200 && $P_100 == $pie_100 && $P_50 == $pie_50 && $P_25 == $pie_25 && $P_10 == $pie_10 && $P_5 == $pie_5){
            return view('admins.resultatbilletage', compact('blt_10000', 'blt_5000', 'blt_2000', 'blt_1000', 'blt_500', 'pie_500', 'pie_250', 'pie_200', 'pie_100', 'pie_50', 'pie_25', 'pie_10', 'pie_5'));
        }
        else{
            return back()->withErrors([
                'message' => 'Vos données saisies sont fausses']);
        }
    }
}
