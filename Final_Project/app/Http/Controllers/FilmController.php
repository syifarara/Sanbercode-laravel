<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Film;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();

        return view('film.index', ['film'=>$film]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('film.tambah', ['genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id'
        ],
        [
            'required' => 'inputan :attribute harus diisi.',
            'exists' => 'inputan :attribute genre belum ada di resource',
            'image' => 'inputan :attribute harus berupa image',
        ]);

        $newImageName = time().'.'.$request->poster->extension();

        $request->poster->move(public_path('uploads'), $newImageName);

        $film = new Film;

        $film->title = $validatedData['title'];
        $film->summary = $validatedData['summary'];
        $film->release_year = $validatedData['release_year'];
        $film->genre_id = $validatedData['genre_id'];
        $film->poster = $newImageName;

        $film->save();

        return redirect('/film');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);

        return view('film.detail', ['film'=>$film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);

        $genres = Genre::all();

        return view('film.edit', ['film'=>$film, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'release_year' => 'required',
            'poster' => 'image|mimes:png,jpg,jpeg',
            'genre_id' => 'required|exists:genres,id'
        ],
        [
            'required' => 'inputan :attribute harus diisi.',
            'exists' => 'inputan :attribute genre belum ada di resource',
            'image' => 'inputan :attribute harus berupa image',
        ]);

        $film = Film::find($id);

        if($request->has('poster')){
            File::delete('uploads/'. $film->poster);

            $newImageName = time().'.'.$request->poster->extension();

            $request->poster->move(public_path('uploads'), $newImageName);

            $film->poster = $newImageName;
        }

        $film->title = $validatedData['title'];
        $film->summary = $validatedData['summary'];
        $film->release_year = $validatedData['release_year'];
        $film->genre_id = $validatedData['genre_id'];
        
        $film->save();

        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);

        if($film->image){
            File::delete('uploads/'. $film->poster);
        }


        $film->delete();
        return view('/film');
    }
}
