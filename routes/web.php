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
    return view('welcome');
});
 
// route pour afficher la page nav
Route::get('index', [ClientController::class, 'navigation'])->name('index');


//Route pour l'authentification client inscription et connexion.
Route::post('inscription', [UserController::class, 'inscription'])->name('inscription');
Route::post('connexion', [UserController::class, 'connexion'])->name('connexion');
Route::post('deconnexion', [Usercontroller::class, 'deconnexion'])->name('deconnexion');
// Route::post('user_list', [Usercontroller::class, 'index'])->name('user_list');
Route::post('userme',[Usercontroller::class,  'me']);

// route pour la gestion des clients
Route::get('abc', [ClientController::class, 'index'])->name('abc');
Route::post('addCustommer', [ClientController::class, 'create'])->name('addCustommer');
Route::put('updateCustomer/{id}', [ClientController::class, 'update'])->name('updateCustomer');
Route::delete('deleteCustomer/{id}', [ClientController::class, 'delete'])->name('deleteCustomer');
Route::get('getCustomer', [ClientController::class, 'index'])->name('getCustomer');


// route pour la gestion des fournisseurs
Route::post('addSupplier', [FournisseurController::class, 'create'])->name('addSupplier');
Route::put('updateSupplier/{id}', [FournisseurController::class, 'update'])->name('updateSupplier');
Route::delete('deleteSupplier/{id}', [FournisseurController::class, 'supprimerFournisseur'])->name('deleteSupplier');
Route::get('getSupplier', [FournisseurController::class, 'index'])->name('getSupplier');

// route pour la gestion des clients
Route::post('addCustommer', [ClientController::class, 'create'])->name('addCustommer');
Route::put('updateCustomer/{id}', [ClientController::class, 'update'])->name('updateCustomer');
Route::delete('deleteCustomer/{id}', [ClientController::class, 'delete'])->name('deleteCustomer');
Route::get('getCustomer', [ClientController::class, 'index'])->name('getCustomer');

// route pour la gestion des Factures
Route::post('addAccount', [FactureController::class, 'create'])->name('addAccount');
Route::put('updateAccount/{id}', [FactureController::class, 'update'])->name('updateAccount');
Route::delete('deleteAccount/{id}', [FactureController::class, 'delete'])->name('deleteAccount');
Route::get('getAccount', [FactureController::class, 'index'])->name('getAccount');
// impression de la facture
Route::get('invoices/{id}/print', [FactureController::class, 'printInvoice'])->name('invoices.print');

// route pour la gestion des Produit
Route::post('addProduct', [ProduitController::class, 'create'])->name('addProduct');
Route::put('updateProduct/{id}', [ProduitController::class, 'update'])->name('updateProduct');
Route::delete('deleteProduct/{id}', [ProduitController::class, 'delete'])->name('deleteProduct');
Route::get('getProduct', [ProduitController::class, 'index'])->name('getProduct');