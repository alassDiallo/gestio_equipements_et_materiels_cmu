<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers;

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
    return view('welcome');
});

Route::get('/str',function(){
    return view('structure.accueil_structure');
});
Route::resource('volontaire',App\Http\Controllers\ControllerVolontaire::class);
Route::resource('structure',App\Http\Controllers\ControllerStructure::class);
Route::resource('volontaire',App\Http\Controllers\ControllerVolontaire::class);
Route::resource('materiel',App\Http\Controllers\ControllerMateriel::class);
Route::resource('fournisseur',App\Http\Controllers\ControllerFournisseur::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
