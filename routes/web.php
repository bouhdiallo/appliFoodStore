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
Route::get('test', [UserController::class, 'abc'])->name('test');
Route::post('inscription', [UserController::class, 'inscription'])->name('inscription');
Route::post('connexion', [UserController::class, 'connexion'])->name('connexion');
Route::post('deconnexion', [Usercontroller::class, 'deconnexion'])->name('deconnexion');
// Route::post('user_list', [Usercontroller::class, 'index'])->name('user_list');
Route::post('userme',[Usercontroller::class,  'me']);

// route pour la gestion des clients
// Route::get('abc', [ClientController::class, 'index'])->name('abc');
// Route::post('addCustommer', [ClientController::class, 'create'])->name('addCustommer');
// Route::put('updateCustomer/{id}', [ClientController::class, 'update'])->name('updateCustomer');
// Route::delete('deleteCustomer/{id}', [ClientController::class, 'delete'])->name('deleteCustomer');
// Route::get('getCustomer', [ClientController::class, 'index'])->name('getCustomer');


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

// route pour la gestion des Factures
Route::get('formAccount', [FactureController::class, 'index'])->name('formAccount');
Route::post('addAccount', [FactureController::class, 'create'])->name('addAccount');

Route::put('updateAccount/{id}', [FactureController::class, 'update'])->name('updateAccount');
Route::delete('deleteAccount/{id}', [FactureController::class, 'delete'])->name('deleteAccount');

// Route::get('getClientFacture/{client_id}', [FactureController::class, 'show'])->name('getClientFacture');
// Appel de la fonction show() avec les deux arguments
Route::get('/show/{client_id}/{produit_id}', [FactureController::class, 'show'])->name('getClientFacture');


// Route::get('getListAccount', [FactureController::class, 'show'])->name('getListAccount'); 
// impression de la facture
Route::get('/invoice/{id}', [FactureController::class, 'printInvoice'])->name('invoices.print');


// Route pour afficher la facture au format PDF
// Route::get('/invoice/{id}', [InvoiceController::class, 'showInvoice'])->name('invoice.show');

// route pour la gestion des Produit
Route::get('formProduct', [ProduitController::class, 'index'])->name('formProduct');
Route::post('addProduct', [ProduitController::class, 'create'])->name('addProduct');

//modification produit
Route::get('updateProduct/{id}', [ProduitController::class, 'update'])->name('updateProduct');
Route::post('updateProductProcess/{id}', [ProduitController::class, 'updateProcess'])->name('updateProductProcess');

Route::get('deleteProduct/{id}', [ProduitController::class, 'delete'])->name('deleteProduct');
Route::get('getListProduct', [ProduitController::class, 'show'])->name('getListProduct');