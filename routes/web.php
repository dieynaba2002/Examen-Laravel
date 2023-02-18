<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ReferentielController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\Candidat_FormationController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('candidats', CandidatController::class);
Route::resource('formations', FormationController::class);
Route::resource('referentiels', ReferentielController::class);
Route::resource('types', TypeController::class);
Route::resource('candidat_formations', Candidat_FormationController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

