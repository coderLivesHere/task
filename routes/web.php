<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;

Route::get('', function ()
{
    return view('index');
});

Route::get('movies/moderation/', [MovieController::class, 'moderation'])->name('movies.moderation');
Route::post('movies/moderation/{id}', [MovieController::class, 'moderated']);

Route::resource('genres', GenreController::class);
Route::resource('movies', MovieController::class);
