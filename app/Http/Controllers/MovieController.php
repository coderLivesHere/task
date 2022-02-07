<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\GenreMovie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('movies.index', ['moviesData' => Movie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create', ['genresData' => Genre::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movieExemplar = new Movie;
        $moviesData = Movie::all();
        $genreMovieExempler = new GenreMovie;
        $movieExemplar->name = $request->post('name');
        $movieExemplar->status = $request->post('status') == 'on' ? true : false;
        $movieExemplar->moderated = false;
        if ($request->hasFile('poster'))
        {
            $poster = $request->file('poster');
            $filename = time().'.'.$poster->getClientOriginalExtension();
            Image::make($poster)->resize(320, 240)
                ->save(public_path($movieExemplar->getPostersPath().$filename));
        }
        else
        {
            $filename = 'default.png';
        }
        $movieExemplar->poster = $filename;
        $movieExemplar->save();
        $genreMovieExempler->genre_id = $request->post('genre');
        $genreMovieExempler->movie_id = $movieExemplar->id;
        $genreMovieExempler->save();
        return redirect()->route('movies.index', ['moviesData' => Movie::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movieElement = Movie::find($id);
        $genreElement = (Movie::find($id)->genresRelatedData)[0];
        return view('movies.show', ['movieElement' => $movieElement, 'genreElement' => $genreElement]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('movies.edit', ['movieElement'=>Movie::find($id), 'id'=>$id, 'genresData'=>Genre::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $movieElement = Movie::find($id);
        $movieElement->name = $request->post('name');
        $status = $request->post('status') == 'on' ? true : false;
        $movieElement->status = $status;
        if ($request->hasFile('poster'))
        {
            $movieElement->deletePoster(Movie::find($id)->poster);
            $poster = $request->file('poster');
            $filename = time().'.'.$poster->getClientOriginalExtension();
            Image::make($poster)->resize(320, 240)
                ->save(public_path($movieElement->getPostersPath().$filename));
        }
        else
        {
            $filename = 'default.png';
        }
        $movieElement->poster = $filename;
        $movieElement->save();
        $genreMovieElement = GenreMovie::where('movie_id', $id)->first();
        $genreMovieElement->genre_id = (int)$request->post('genre');
        $genreMovieElement->save();
        return redirect()->route('movies.index', ['moviesData' => Movie::all()]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $movieExemplar = new Movie;
        $movieExemplar->deletePoster(Movie::find($request->post('id'))->poster);
        GenreMovie::where('movie_id', $request->post('id'))->delete();
        Movie::find($request->post('id'))->delete();
        return redirect()->route('movies.index', ['moviesData' => Movie::all()]);
    }

    public function moderation()
    {
        return view('movies.moderation', ['moviesData' => Movie::all()]);
    }

    public function moderated($id)
    {
        $movieElement = Movie::find($id);
        $movieElement->moderated = true;
        $movieElement->save();
        return redirect()->route('movies.moderation', ['moviesData' => Movie::all()]);
    }
}
