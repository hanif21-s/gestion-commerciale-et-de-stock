<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\Commande;
use App\Models\Reglement;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use App\Models\Ravitaillement;
use App\Models\LigneRavitaillement;
use App\Models\Fournisseur;
use PDF;
use Session;
use DB;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('auth');
    }

    public function viewPDF(Commande $commande){
        $lignecommandes=LigneCommande::where('commandes_id',$commande->id)->get();
        //dd($lignecommandes);
        $produits = Produit::all();
        //dd($produits);
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($commande->total_TTC);
        $monnaie = $commande->reglement_client-$commande->total_TTC;
        $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commande->id)->first();
        $value = $prix_total->total;
        $monnaie = $commande->reglement_client-$commande->total_TTC;

        return view('viewFacture', compact('prix_lettre', 'commande', 'lignecommandes', 'monnaie','value'));
    }

    public function detail(Commande $commande){
        $lignecommandes=LigneCommande::where('commandes_id',$commande->id)->get();
        //dd($lignecommandes);
        $produits = Produit::all();
        //dd($produits);
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($commande->total_TTC);
        $monnaie = $commande->reglement_client-$commande->total_TTC;
        $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commande->id)->first();
        $value = $prix_total->total;
        $monnaie = $commande->reglement_client-$commande->total_TTC;

        return view('admins.detailcommande', compact('prix_lettre', 'commande', 'lignecommandes', 'monnaie','value'));
    }

    public function generatePDF($commande)
    {
        $commandes = Commande::find($commande);
        $lignecommandes=LigneCommande::where('commandes_id',$commande)->get();
        $produits = Produit::all();
        $clients = Client::all();
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($commandes->total_TTC);
        $monnaie = $commandes->reglement_client-$commandes->total_TTC;
        $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commandes->id)->first();
        $value = $prix_total->total;
        $data = [
            'prix_lettre' => $prix_lettre,
            'commandes' => $commandes,
            'clients' => $clients,
            'lignecommandes' => $lignecommandes,
            'produits' => $produits,
            'monnaie' => $monnaie,
            'value' => $value
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('factures.pdf');
    }

    public function generatePdfRavi(Ravitaillement $ravitaillement){
        $ligneravitaillements=LigneRavitaillement::where('ravitaillements_id',$ravitaillement->id)->get();
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($ravitaillement->total_TTC);

        $data = [
            'ravitaillement' => $ravitaillement,
            'ligneravitaillements' => $ligneravitaillements,
            'prix_lettre' => $prix_lettre
        ];
        $pdf = PDF::loadView('decharge', $data);

        return $pdf->download('ravitaillements.pdf');


    }

    public function generatePDFduplicata(Commande $commande)
    {
        $date = now()->toDateString('d-m-Y');
        $date_du_jour = date('d/m/Y', strtotime($date));
        $lignecommandes=LigneCommande::where('commandes_id',$commande->id)->get();
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($commande->total_TTC);
        $monnaie = $commande->reglement_client-$commande->total_TTC;
        $prix_total = LigneCommande::select(DB::raw('sum(prix_total) as total'))->where('commandes_id', '=', $commande->id)->first();
        $value = $prix_total->total;
        $data = [
            'prix_lettre' => $prix_lettre,
            'commande' => $commande,
            'lignecommandes' => $lignecommandes,
            'monnaie' => $monnaie,
            'value' => $value,
            'date_du_jour' => $date_du_jour
        ];

        $pdf = PDF::loadView('duplicata', $data);

        return $pdf->download('duplicata.pdf');
    }





}
