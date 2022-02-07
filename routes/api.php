<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\MovieController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('genres', [GenreController::class, 'getGenres']);
Route::get('genres/{id}', [GenreController::class, 'allMoviesGenre']);
Route::get('movies', [MovieController::class, 'getMovies']);
Route::get('movies/{id}', [MovieController::class, 'getMovie']);
