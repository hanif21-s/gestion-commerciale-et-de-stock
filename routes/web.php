<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

//Routes Admin--Accueil
Route::middleware([
    'auth:sanctum', 'verified'])->get('/accueil',function () {
        return view('admins.welcome');
    })->name('admins.welcome');

//Routes Admin--Utilisateurs
Route::get('admins/utilisateurs',[App\Http\Controllers\Admins\UtilisateurController::class, "index"])->name("admins.utilisateurs");
Route::delete('admins/utilisateurs/{utilisateur}',[App\Http\Controllers\Admins\UtilisateurController::class, "delete"])->name("utilisateurs.supprimer");
Route::get('admins/utilisateurs/create',[App\Http\Controllers\Admins\UtilisateurController::class, "create"])->name("utilisateurs.create");
Route::post('admins/utilisateurs/create',[App\Http\Controllers\Admins\UtilisateurController::class, "store"])->name("utilisateurs.ajouter");
Route::get('admins/utilisateurs/{utilisateur}',[App\Http\Controllers\Admins\UtilisateurController::class, "edit"])->name("utilisateurs.edit");
Route::put('admins/utilisateurs/{utilisateur}',[App\Http\Controllers\Admins\UtilisateurController::class, "update"])->name("utilisateurs.update");

//Routes Admin--Remises
Route::get('admins/remises',[App\Http\Controllers\Admins\RemiseController::class, "index"])->name("admins.remises");
Route::delete('admins/remises/{remise}',[App\Http\Controllers\Admins\RemiseController::class, "delete"])->name("remises.supprimer");
Route::get('admins/remises/create',[App\Http\Controllers\Admins\RemiseController::class, "create"])->name("remises.create");
Route::post('admins/remises/create',[App\Http\Controllers\Admins\RemiseController::class, "store"])->name("remises.ajouter");
Route::get('admins/remises/{remise}',[App\Http\Controllers\Admins\RemiseController::class, "edit"])->name("remises.edit");
Route::put('admins/remises/{remise}',[App\Http\Controllers\Admins\RemiseController::class, "update"])->name("remises.update");

//Routes Admin--Depense
Route::get('admins/depenses',[App\Http\Controllers\Admins\DepenseController::class, "index"])->name("admins.depenses");
Route::delete('admins/depenses/{depense}',[App\Http\Controllers\Admins\DepenseController::class, "delete"])->name("depenses.supprimer");
Route::get('admins/depenses/create',[App\Http\Controllers\Admins\DepenseController::class, "create"])->name("depenses.create");
Route::post('admins/depenses/create',[App\Http\Controllers\Admins\DepenseController::class, "store"])->name("depenses.ajouter");
Route::get('admins/depenses/{depense}',[App\Http\Controllers\Admins\DepenseController::class, "edit"])->name("depenses.edit");
Route::put('admins/depenses/{depense}',[App\Http\Controllers\Admins\DepenseController::class, "update"])->name("depenses.update");

//Routes Admin--Categories
Route::get('admins/categories',[App\Http\Controllers\Admins\CategorieController::class, "index"])->name("admins.categories");
Route::get('admins/Listcategories',[App\Http\Controllers\Admins\CategorieController::class, "index1"])->name("admins.listCategorie");
Route::get('admins/categories/create',[App\Http\Controllers\Admins\CategorieController::class, "create"])->name("categories.create");
Route::post('admins/categories/create',[App\Http\Controllers\Admins\CategorieController::class, "store"])->name("categories.ajouter");
Route::get('admins/categories/{categorie}',[App\Http\Controllers\Admins\CategorieController::class, "edit"])->name("categories.edit");
Route::put('admins/categories/{categorie}',[App\Http\Controllers\Admins\CategorieController::class, "update"])->name("categories.update");
Route::delete('admins/categories/{categorie}',[App\Http\Controllers\Admins\CategorieController::class, "delete"])->name("categories.supprimer");

//Routes Admin--Fournisseurs
Route::get('admins/fournisseurs',[App\Http\Controllers\Admins\FournisseurController::class, "index"])->name("admins.fournisseurs");
Route::delete('admins/fournisseurs/{fournisseur}',[App\Http\Controllers\Admins\FournisseurController::class, "delete"])->name("fournisseurs.supprimer");
Route::get('admins/fournisseurs/create',[App\Http\Controllers\Admins\FournisseurController::class, "create"])->name("fournisseurs.create");
Route::post('admins/fournisseurs/create',[App\Http\Controllers\Admins\FournisseurController::class, "store"])->name("fournisseurs.ajouter");
Route::get('admins/fournisseurs/{fournisseur}',[App\Http\Controllers\Admins\FournisseurController::class, "edit"])->name("fournisseurs.edit");
Route::put('admins/fournisseurs/{fournisseur}',[App\Http\Controllers\Admins\FournisseurController::class, "update"])->name("fournisseurs.update");

//Routes Admin--Produits
Route::get('admins/commandeProduits',[App\Http\Controllers\Admins\ProduitController::class, "index1"])->name("admins.commandeProduits");
Route::get('admins/produits',[App\Http\Controllers\Admins\ProduitController::class, "index"])->name("admins.produits");
Route::get('admins/produits/create',[App\Http\Controllers\Admins\ProduitController::class, "create"])->name("produits.create");
Route::get('admins/produits/createCommandeProduits/{id}',[App\Http\Controllers\Admins\ProduitController::class, "create1"])->name("produits.createCommandeProduits");
Route::get('admins/produits/{produit}',[App\Http\Controllers\Admins\ProduitController::class, "edit"])->name("produits.edit");
Route::post('admins/produits/create',[App\Http\Controllers\Admins\ProduitController::class, "store"])->name("produits.ajouter");
Route::delete('admins/produits/{produit}',[App\Http\Controllers\Admins\ProduitController::class, "delete"])->name("produits.supprimer");
Route::put('admins/produits/{produit}',[App\Http\Controllers\Admins\ProduitController::class, "update"])->name("produits.update");

//Routes Admin--Commandes
Route::get('admins/commandes',[App\Http\Controllers\Admins\CommandeController::class, "index"])->name("admins.commandes");
Route::get('admins/commandesvalides',[App\Http\Controllers\Admins\CommandeController::class, "index2"])->name("admins.commandesvalides");
Route::get('admins/commandes/create',[App\Http\Controllers\Admins\CommandeController::class, "create"])->name("commandes.create");
Route::get('admins/commandes/view/{commande}', [App\Http\Controllers\Admins\CommandeController::class, 'view'])->name("commandes.see");
Route::get('admins/commandes/{commande}',[App\Http\Controllers\Admins\CommandeController::class, "edit"])->name("commandes.edit");
Route::post('admins/commandes/store',[App\Http\Controllers\Admins\CommandeController::class, "store"])->name("commandes.ajouter");
Route::delete('admins/commandes/{commande}',[App\Http\Controllers\Admins\CommandeController::class, "delete"])->name("commandes.supprimer");
Route::put('admins/commandes/{commande}',[App\Http\Controllers\Admins\CommandeController::class, "update"])->name("commandes.update");
Route::delete('admins/commandes/delete/{commandes}',[App\Http\Controllers\Admins\CommandeController::class, "deleteAll"])->name("allcommande.supprimer");
Route::delete('admins/commandes/supprimer/{commande}',[App\Http\Controllers\Admins\CommandeController::class, "delete1"])->name("commandes.supprimer1");


//Routes Admin--Ravitaillements
Route::get('admins/ravitaillements',[App\Http\Controllers\Admins\RavitaillementController::class, "index"])->name("admins.ravitaillements");
Route::get('admins/ravitaillements/create',[App\Http\Controllers\Admins\RavitaillementController::class, "create"])->name("ravitaillements.create");
Route::post('admins/ravitaillements/store',[App\Http\Controllers\Admins\RavitaillementController::class, "store"])->name("ravitaillements.ajouter");
Route::get('admins/ravitaillements/view/{ravitaillement}', [App\Http\Controllers\Admins\RavitaillementController::class, 'view'])->name("ravitaillements.see");
Route::delete('admins/ravitaillements/{ravitaillement}',[App\Http\Controllers\Admins\RavitaillementController::class, "delete"])->name("ravitaillements.supprimer");

//Routes Admin--LigneCommandes
Route::get('admins/lignecommandes',[App\Http\Controllers\Admins\LigneCommandeController::class, "index"])->name("admins.lignecommandes");
Route::get('admins/lignecommandes/create',[App\Http\Controllers\Admins\LigneCommandeController::class, "create"])->name("lignecommandes.create");
Route::get('admins/lignecommandes/{lignecommande}',[App\Http\Controllers\Admins\LigneCommandeController::class, "edit"])->name("lignecommandes.edit");
Route::post('admins/lignecommandes/create/{id}',[App\Http\Controllers\Admins\LigneCommandeController::class, "store"])->name("lignecommandes.ajouter");
Route::delete('admins/lignecommandes/{lignecommande}',[App\Http\Controllers\Admins\LigneCommandeController::class, "delete"])->name("lignecommandes.supprimer");
Route::put('admins/lignecommandes/{lignecommande}',[App\Http\Controllers\Admins\LigneCommandeController::class, "update"])->name("lignecommandes.update");

//Routes Admin--Clients
Route::get('admins/clients',[App\Http\Controllers\Admins\ClientController::class, "index"])->name("admins.clients");
Route::get('admins/clientFacture/{commandes_id}',[App\Http\Controllers\Admins\ClientController::class, "index1"])->name("admins.clientFacture");
Route::get('admins/clients/create',[App\Http\Controllers\Admins\ClientController::class, "create"])->name("clients.create");
Route::get('admins/clients/{client}',[App\Http\Controllers\Admins\ClientController::class, "edit"])->name("clients.edit");
Route::post('admins/clients/create',[App\Http\Controllers\Admins\ClientController::class, "store"])->name("clients.ajouter");
Route::delete('admins/clients/{client}',[App\Http\Controllers\Admins\ClientController::class, "delete"])->name("clients.supprimer");
Route::put('admins/clients/{client}',[App\Http\Controllers\Admins\ClientController::class, "update"])->name("clients.update");
//Routes Admin--Factures
Route::get('admins/bilan',[App\Http\Controllers\Admins\FactureController::class, "balance"])->name("admins.bilan");
Route::get('/accueil',[App\Http\Controllers\Admins\FactureController::class, "caisse"])->name("admins.welcome");
Route::put('admins/factures/{commande}',[App\Http\Controllers\Admins\FactureController::class, "index"])->name("admins.factures");
Route::get('admins/allfactures',[App\Http\Controllers\Admins\FactureController::class, "index1"])->name("admins.allfactures");

Route::get('admins/facture/{commande}',[App\Http\Controllers\Admins\FactureController::class, "create"])->name("factures.create");
//PDF
Route::get('generate/{commande}', [PDFController::class, 'generatePDF'])->name("generate");
Route::get('generate/duplicata/{commande}', [PDFController::class, 'generatePDFduplicata'])->name("generateduplicata");
Route::get('view/{commande}', [PDFController::class, 'viewPDF'])->name("sale");
Route::get('ravitaillement/imprimer/{ravitaillement}', [PDFController::class, 'generatePdfRavi'])->name("generate2");
//Route Admin--Reglements
Route::get('admins/reglements/{client_id}',[App\Http\Controllers\Admins\ReglementController::class, "index"])->name("admins.reglements");
Route::delete('admins/reglements/{reglement}',[App\Http\Controllers\Admins\ReglementController::class, "delete"])->name("reglements.supprimer");
Route::get('admins/reglements/create',[App\Http\Controllers\Admins\ReglementController::class, "create"])->name("reglements.create");
Route::post('admins/reglements/create',[App\Http\Controllers\Admins\ReglementController::class, "store"])->name("reglements.ajouter");
Route::get('admins/reglements/{reglement}',[App\Http\Controllers\Admins\ReglementController::class, "edit"])->name("reglements.edit");
Route::put('admins/reglements/{reglement}',[App\Http\Controllers\Admins\ReglementController::class, "update"])->name("reglements.update");

//Route Billetage
Route::get('admins/verificationbilletage',[App\Http\Controllers\Admins\BilletageController::class, "index"])->name("admins.billetage");
Route::post('admins/resultat/verificationbilletage',[App\Http\Controllers\Admins\BilletageController::class, "resultat"])->name("resultat.billetage");

Route::middleware([
    'auth:sanctum', 'verified'])->get('/gerant/dashboard',function () {
        return view('gerant-dashboard');
    })->name('gerant-dashboard');

Route::middleware([
    'auth:sanctum', 'verified'])->get('/commercial/dashboard',function () {
        return view('commercial-dashboard');
    })->name('commercial-dashboard');

Route::middleware([
    'auth:sanctum', 'verified'])->get('/caissier/dashboard',function () {
        return view('caissier-dashboard');
    })->name('caissier-dashboard');


