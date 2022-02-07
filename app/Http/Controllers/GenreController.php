<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('genres.index', ['genresData' => Genre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genreExemplar = new Genre;
        $genreExemplar->name = $request->post('name');
        $genreExemplar->save();
        return redirect()->route('genres.index', ['genresData' => Genre::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('genres.show', ['genreElement' => Genre::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('genres.edit', ['id'=>$id, 'genreElement' => Genre::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genreElement = Genre::find($id);
        $genreElement->name = $request->post('name');
        $genreElement->save();
        return redirect()->route('genres.index', ['genresData' => Genre::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Genre::find($request->post('id'))->delete();
        return redirect()->route('genres.index', ['genresData' => Genre::all()]);
    }
}
