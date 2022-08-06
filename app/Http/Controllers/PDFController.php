<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use App\Models\Commande;
use App\Models\Reglement;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use PDF;
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

    
 /*    public function store(Request $request, $client,$last_id_commandes,$reglement){ 
        $date = now()->toDateString('d-m-Y');
        $commandes_id = $last_id_commandes;
        $factures = new Facture();
        $factures->num_interne=$this->make_random_custom_string(6);
        $factures->total_taxe="1200";
        $factures->total_remise="500";
        $factures->date=$date;
        $factures->clients_id=$client;
        $factures->reglements_id=$reglement;
        $factures->commandes_id=$commandes_id;
        $prix_total = DB::table('ligne_commandes')
            ->select('prix_total')
            ->where([
                ['ligne_commandes.commandes_id', '=', $commandes_id]
            ])
            ->first();
        $factures->total_HT=sum($prix_total);
        $factures->total_TTC = $factures->total_HT + $factures->total_taxe - $factures->total_remise;
        $factures->save();
        //dd($factures);
        return redirect('admins/factures')->with("success", "Facture ajoutée avec succès!");
    }*/

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

        $data = [
            'logo' => "img/logo.png",
            'facture' => $factures,
            'client' => $client,
            'lignecommandes' => $lignecommandes,
            'produit' => $produits
        ];
                     
        $pdf = PDF::loadView('myPDF', $data);
    
        return $pdf->download('factures.pdf');
    }





}