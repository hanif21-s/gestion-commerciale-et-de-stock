<?php

use Illuminate\Support\Facades\Route;

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
    'auth:sanctum', 'verified'])->get('/admins/accueil',function () {
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

//Routes Admin--Taxes
Route::get('admins/taxes',[App\Http\Controllers\Admins\TaxeController::class, "index"])->name("admins.taxes");
Route::delete('admins/taxes/{taxe}',[App\Http\Controllers\Admins\TaxeController::class, "delete"])->name("taxes.supprimer");
Route::get('admins/taxes/create',[App\Http\Controllers\Admins\TaxeController::class, "create"])->name("taxes.create");
Route::post('admins/taxes/create',[App\Http\Controllers\Admins\TaxeController::class, "store"])->name("taxes.ajouter");
Route::get('admins/taxes/{taxe}',[App\Http\Controllers\Admins\TaxeController::class, "edit"])->name("taxes.edit");
Route::put('admins/taxes/{taxe}',[App\Http\Controllers\Admins\TaxeController::class, "update"])->name("taxes.update");

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
Route::get('admins/produits',[App\Http\Controllers\Admins\ProduitController::class, "index"])->name("admins.produits");
Route::get('admins/produits/create',[App\Http\Controllers\Admins\ProduitController::class, "create"])->name("produits.create");
Route::get('admins/produits/{produit}',[App\Http\Controllers\Admins\ProduitController::class, "edit"])->name("produits.edit");
Route::post('admins/produits/create',[App\Http\Controllers\Admins\ProduitController::class, "store"])->name("produits.ajouter");
Route::delete('admins/produits/{produit}',[App\Http\Controllers\Admins\ProduitController::class, "delete"])->name("produits.supprimer");
Route::put('admins/produits/{produit}',[App\Http\Controllers\Admins\ProduitController::class, "update"])->name("produits.update");

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
