<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FournisseurController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Admin.connexion');
});
 //Route pour afficher le nouveau dashboard
 Route::get('dash', [ClientController::class, 'dashboard'])->name('dash');



 //Route page d'accueil des utilisateurs(superAdmin, user et caissiere)
Route::get('caissiere', [FactureController::class, 'caissiereAccueil'])->name('caissiere');
Route::get('user', [ClientController::class, 'userAccueil'])->name('user');
Route::get('superAdmin', [ClientController::class, 'superAdminAccueil'])->name('superAdmin');



// route pour afficher la page nav
Route::get('index', [ClientController::class, 'navigation'])->name('index');


//Route pour l'authentification client inscription et connexion.
Route::get('formConnect', [UserController::class, 'abc'])->name('formConnect');
Route::post('inscription', [UserController::class, 'inscription'])->name('inscription');
Route::post('connexion', [UserController::class, 'connexion'])->name('connexion');
Route::post('deconnect', [Usercontroller::class, 'deconnexion'])->name('deconnect');
// Route::post('user_list', [Usercontroller::class, 'index'])->name('user_list');
Route::post('userme',[Usercontroller::class,  'me']);

// route pour la gestion des fournisseurs
Route::get('formSupplier', [FournisseurController::class, 'index'])->name('formSupplier');
Route::post('addSupplier', [FournisseurController::class, 'create'])->name('addSupplier');

Route::get('updateSupplier/{id}', [FournisseurController::class, 'update'])->name('updateSupplier');
Route::post('updateSupplierProcess/{id}', [FournisseurController::class, 'updateProcess'])->name('updateSupplierProcess');

Route::get('deleteSupplier/{id}', [FournisseurController::class, 'delete'])->name('deleteSupplier');
Route::get('getListSupplier', [FournisseurController::class, 'show'])->name('getListSupplier');

// route pour la gestion des clients
Route::get('formCustomer', [ClientController::class, 'index'])->name('formCustomer');
Route::post('addCustommer', [ClientController::class, 'create'])->name('addCustommer');

Route::get('updateCustomer/{id}', [ClientController::class, 'update'])->name('updateCustomer');
Route::post('updateCustomerProcess/{id}', [ClientController::class, 'updateProcess'])->name('updateCustomerProcess');

Route::get('deleteCustomer/{id}', [ClientController::class, 'delete'])->name('deleteCustomer');

Route::get('getListCustomer', [ClientController::class, 'show'])->name('getListCustomer');

//************************************************************************************************************************

// Route::get('factures/create', [FactureController::class, 'creating'])->name('factures.create');
// Route::post('factures', [FactureController::class, 'storing'])->name('factures.store');

// route pour la gestion des Factures
Route::get('formAccount', [FactureController::class, 'index'])->name('formAccount');
Route::post('addAccount', [FactureController::class, 'create'])->name('addAccount');

Route::put('updateAccount/{id}', [FactureController::class, 'update'])->name('updateAccount');
Route::delete('deleteAccount/{id}', [FactureController::class, 'delete'])->name('deleteAccount');

// Appel de la fonction show() avec les deux arguments pour recuper la liste des factures pour un client donné.
Route::get('/show/{client_id}/{produit_id}', [FactureController::class, 'listFacture'])->name('getClientFacture');

//liste de tous les factures qui sont au niveau de la table facture
Route::get('getAllFacture', [FactureController::class, 'listAllFacture'])->name('getAllFacture');
// impression de la facture
Route::get('/invoice/{id}', [FactureController::class, 'printInvoice'])->name('invoices.print');

//*********************************************************************************************************************

// route pour la gestion des Produit
Route::get('formProduct', [ProduitController::class, 'index'])->name('formProduct');
Route::post('addProduct', [ProduitController::class, 'create'])->name('addProduct');

//modification produit
Route::get('updateProduct/{id}', [ProduitController::class, 'update'])->name('updateProduct');
Route::post('updateProductProcess/{id}', [ProduitController::class, 'updateProcess'])->name('updateProductProcess');

Route::get('deleteProduct/{id}', [ProduitController::class, 'delete'])->name('deleteProduct');
Route::get('getListProduct', [ProduitController::class, 'show'])->name('getListProduct');