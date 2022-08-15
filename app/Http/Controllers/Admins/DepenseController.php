<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\Billetage;
use DB;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $depenses = Depense::all();
        return view('admins.depense',compact('depenses'));
    }

    public function create() {
            return view('admins.createDepense');
        }

        public function store(Request $request){
            $date = $request->input('date');
            $libelle = $request->input('libelle');
            $montant = $request->input('montant');
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
            $somme_billetage = $B_10000 + $B_5000 + $B_2000 + $B_1000 + $B_500 + $P_500 + $P_250 + $P_200 + $P_100 + $P_50 + $P_25 + $P_10 + $P_5;
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
        if($montant>$value){
            return back()->withErrors([
                'message' => 'Montant en caisse insuffisant!']);
        }
            if ($montant == $somme_billetage){
                $depenses = new Depense();
                $depenses->date = $date;
                $depenses->libelle = $libelle;
                $depenses->montant = $montant;
                $depenses->users_id = Auth::user()->id;
                $depenses->save();

                $rbil = new Billetage();
                $rbil->depenses_id = $depenses->id;
                $rbil->type = 0;
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
                $rbil->total = $somme_billetage;
                $rbil->save();

                return redirect('/admins/depenses')->with("success", "Depense ajoutée avec succès!");
            }
            else{
                return back()->withErrors([
                    'message' => 'Billetage incorrect!']);
            }
        }

    public function edit(Depense $depense) {
        return view('admins.editDepense', compact('depense'));
    }

    public function update(Request $request, Depense $depense){
        $request->validate([
            "date"=>"required",
                "libelle"=>"required",
                "montant"=>"required",
                "users_id"=>"required",
        ]);
        $dépenses = Depense::select(DB::raw('sum(montant) as somme'))->first();
        $valueDepense = $dépenses->somme;
        $commandes = Facture::select(DB::raw('sum(total_TTC) as total'))->first();
        $valueCommande = $commandes->total;
        $value_caisse = $valueCommande-$valueDepense;
        $value_a_modifier = $depense->montant;
        $value_initial_caisse = $value_a_modifier + $value_caisse;
        if($request->input('montant') > $value_initial_caisse){
            return back()->withErrors([
            'message' => 'Dépense impossible à effectuer! Montant en caisse insuffisant.']);
        }
        else{
            $depense->update($request->all());
            return redirect('/admins/depenses')->with("success", "Depense mise à jour avec succès!");
        }
    }

    public function delete(Depense $depense){
        $nom_complet = $depense->libelle;
        $depense->delete();
        return back()->with("successDelete", "La Depense '$nom_complet' supprimée avec succès!");
    }
}
