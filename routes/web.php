<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

// Rotta home con lsta film divisi per genere:
Route::get('/', [MainController::class, 'home'])
    ->name('home');

// Rotta home di movie per lista film non divisi per genere:
Route::get('/movie', [MainController::class, 'movieList'])
    ->name('home.movie');

// Rotta per form:
Route::get('/movie/create', [MainController::class, 'createMovie'])
    ->name('movieCreate');
