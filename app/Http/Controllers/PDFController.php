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

    public function viewPDF($facture_id){
        $facture=Facture::find($facture_id);
        $commandes_id = $facture->commandes_id;
        $commande = Commande::find($commandes_id);
        $client=Client::where('id',$commande->clients_id)->first();
        $lignecommandes=LigneCommande::where('commandes_id',$facture->commandes_id)->get();
        //dd($lignecommandes);
        $produits = Produit::all();
        //dd($produits);
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($facture->total_TTC);

        return view('viewFacture', compact('prix_lettre', 'facture', 'client', 'lignecommandes', 'produits'));
    }

    public function generatePDF($facture_id)
    {


        $factures=Facture::find($facture_id);
        $commandes_id = $factures->commandes_id;
        $commande = Commande::find($commandes_id);
        $client=Client::where('id',$commande->clients_id)->first();
        $lignecommandes=LigneCommande::where('commandes_id',$factures->commandes_id)->get();
        //dd($lignecommandes);
        $produits = Produit::all();
        //dd($produits);
        $f = new \NumberFormatter("fr", \NumberFormatter::SPELLOUT);
        $prix_lettre = $f->format($factures->total_TTC);

        $data = [
            'prix_lettre' => $prix_lettre,
            'facture' => $factures,
            'client' => $client,
            'lignecommandes' => $lignecommandes,
            'produit' => $produits
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('factures.pdf');
    }

    public function generatePdfRavi($ravitaillement_id, $fournisseur_id){
        $ravitaillements = Ravitaillement::find($ravitaillement_id);
        $fournisseurs = Fournisseur::find($fournisseur_id);
        $produits = Produit::all();
        $ligneravitaillements = LigneRavitaillement::where('ravitaillements_id', $ravitaillement_id)->get();
        $prix_total = LigneRavitaillement::select(DB::raw('sum(prix_total) as total'))->where('ravitaillements_id', '=', $ravitaillement_id)->first();
        $value = $prix_total->total;

        $data = [
            'ravitaillements' => $ravitaillements,
            'fournisseurs' => $fournisseurs,
            'produits' => $produits,
            'ligneravitaillements' => $ligneravitaillements,
            'value' => $value
        ];
        $pdf = PDF::loadView('decharge', $data);
        //$file = $pdf->download('ravitaillements.pdf');
        //Session::flash('download.in.the.next.request', 'file');

        //return Redirect::to('/admins/fournisseurs');

        return $pdf->download('ravitaillements.pdf');
        //return redirect('/admins/fournisseurs');


    }





}
