<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RechercheAjaxController;

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

// Page erreur
Route::fallback(function () {
    return view('error');
});

// Page pour les utilisateurs
Route::get('/', [FormsController::class, 'index']);
Route::resource('forms', FormsController::class)->middleware('auth');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [App\Http\Controllers\FormsController::class, 'index'])->name('dashboard');

// Panel Admin
//Route::get('/admin', [AdminController::class, 'index']);
// Route::resource('admin', AdminController::class)->middleware('isAdmin');
Route::resource('admin', AdminController::class)->middleware(['isAdmin', 'auth']);
Route::middleware(['auth:sanctum', 'verified'])->get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin')->middleware('isAdmin');

// Recherche Ajax
Route::get('/action', [RechercheAjaxController::class, 'action'])->name('recherche');

//form builder routes
Route::post('submit', [FormsController::class, 'store'])->name('submit');
