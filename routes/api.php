<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('inscription', [UserController::class, 'inscription'])->name('inscription');
Route::post('connexion', [UserController::class, 'connexion'])->name('connexion');
Route::post('deconnexion', [Usercontroller::class, 'deconnexion'])->name('deconnexion');
// Route::post('user_list', [Usercontroller::class, 'index'])->name('user_list');
Route::post('userme',[Usercontroller::class,  'me']);
