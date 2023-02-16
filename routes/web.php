<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ApiController;
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

// Rotta per ricezione dati da form;ù:
Route::post('/movie/create', [MainController::class, 'storeMovie'])
    ->name('storeMovie');

// Rotta per eliminare movie:
Route::get('/movie/delete/{movie}', [MainController::class, 'deleteMovie'])
    ->name('deleteMovie');

// Rotta per form con dati vecchi per edit:
Route::get('/movie/edit/{movie}', [MainController::class, 'editMovie'])
    ->name('editMovie');

// Rotta per update:
Route::post('/movie/update/{movie}', [MainController :: class, 'updateMovie'])
    -> name('updateMovie');

// Rotta test:
Route::get('/api/v1/test',[ApiController::class,'test']);

// Rotta per lista movies:
Route::get('/api/v1/movie/all',[ApiController::class,'movieAll']);