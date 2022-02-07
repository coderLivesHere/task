<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GenreMovie;
use App\Models\Movie;
use App\Models\Genre;

class GenreController extends Controller
{
    public function getGenres()
    {
        return Genre::all();
    }

    public function allMoviesGenre($id)
    {
        $relatedData = (Genre::find($id)->moviesRelatedData)[0]['pivot'];
        $allRelatedData = GenreMovie::where('genre_id', $relatedData->genre_id)->get();
        foreach ($allRelatedData as $element)
        {
            $elementDatabase = Movie::find($element->id);
            $link = url('').Movie::getPostersPath().$elementDatabase->poster;
            $elementDatabase->link = $link;
            $result[] = $elementDatabase;
        }
        return $result;
    }
}
