<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieController extends Controller
{
    public function getMovies()
    {
        return Movie::all();
    }

    public function getMovie($id)
    {
        return Movie::find($id);
    }
}
