<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function genresRelatedData()
    {
        return $this->belongsToMany(Genre::class, 'genre_movies', 'movie_id', 'genre_id');
    }

    public function getPostersPath()
    {
        $path = 'uploads/posters/';
        if (!file_exists("{$path}"))
        {
            mkdir("{$path}", 0777, true);
        }
        return "/{$path}";
    }

    public function deletePoster($poster_name)
    {
        $path = 'uploads/posters/';
        if (file_exists("{$path}{$poster_name}") && $poster_name != 'default.png')
        {
            unlink("{$path}{$poster_name}");
        }
    }
}
