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
        $somme_billet_10000 = $billet_10000 * 10000;
        $somme_billet_5000 = $billet_5000 * 5000;
        $somme_billet_2000 = $billet_2000 * 2000;
        $somme_billet_1000 = $billet_1000 * 1000;
        $somme_billet_500 = $billet_500 * 500;
        $somme_piece_500 = $piece_500 * 500;
        $somme_piece_250 = $piece_250 * 250;
        $somme_piece_200 = $piece_200 * 200;
        $somme_piece_100 = $piece_100 * 100;
        $somme_piece_50 = $piece_50 * 50;
        $somme_piece_25 = $piece_25 * 25;
        $somme_piece_10 = $piece_10 * 10;
        $somme_piece_5 = $piece_5 * 5;

        if($B_10000 == $billet_10000 && $B_5000 == $billet_5000 && $B_2000 == $billet_2000 && $B_1000 == $billet_1000 && $B_500 == $billet_500 && $P_500 == $piece_500 && $P_250 == $piece_250 && $P_200 == $piece_200 && $P_100 == $piece_100 && $P_50 == $piece_50 && $P_25 == $piece_25 && $P_10 == $piece_10 && $P_5 == $piece_5){
            return view('admins.resultatbilletage', compact('billet_10000', 'billet_5000', 'billet_2000', 'billet_1000', 'billet_500', 'piece_500', 'piece_250', 'piece_200', 'piece_100', 'piece_50', 'piece_25', 'piece_10', 'piece_5'));
        }
        else{
            return back()->withErrors([
                'message' => 'Vos données saisies sont fausses']);
        }
    }
}
