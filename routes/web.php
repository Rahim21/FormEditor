<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormsController;

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

Route::fallback(function () {
    return view('error');
});
Route::get('/', [FormsController::class, 'index']);
Route::resource('forms', FormsController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [App\Http\Controllers\FormsController::class, 'index'])->name('dashboard');
