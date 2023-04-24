<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\GameController::class, 'joaquindinosalgo'])->name('login');
Route::post('/game', [App\Http\Controllers\GameController::class, 'game'])->name('game');
Route::post('/results', [App\Http\Controllers\GameController::class, 'results'])->name('results');
Route::get('/choice', [App\Http\Controllers\GameController::class, 'choice'])->name('choice');


