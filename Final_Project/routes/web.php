<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReviewController;


Route::get('/', [DasboardController::class, 'utama']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/welcomepage', [AuthController::class, 'welcomepage'])->name('welcomepage');

Route::get('/table', function(){
    return view('pages.table');
});

Route::get('/data-table', function() {
    return view('pages.data-table');
});


Route::middleware('auth')->group(function(){

// Create Data
Route::get('/cast/create', function(){
    return view('cast.tambah');
});
Route::post('/cast', [CastController::class, 'store']);

// Read Data
Route::get('/cast', [CastController::class, 'index']);
Route::get('/cast/{id}', [CastController::class, 'show']);

//Update Data
Route::get('/cast/{id}/edit', [CastController::class, 'edit']);
Route::put('/cast/{id}', [CastController::class, 'update']);

//CRUD Genre
Route::resource('genre', GenreController::class);

Route::post('/review/{film_id}', [ReviewController::class, 'store']);
});


//CRUD Film
Route::resource('film', FilmController::class);

Auth::routes();