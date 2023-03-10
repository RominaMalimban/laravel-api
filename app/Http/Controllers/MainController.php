<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Genre;
use App\Models\Movie;
class MainController extends Controller
{
    // METODO HOME: con lista movies suddivisi per genere:
    public function home(){

        $genres = Genre:: all();
        return view('pages.home', compact('genres'));
    }

    // METODO MOVIE LIST: per stampare lista completa di movies:
    public function movieList(){

        $movies = Movie::all();

        return view('pages.movie.home', compact('movies'));
    }

    // METODO CREATE PER FORM:
    public function createMovie(){

        $genres = Genre::all();
        $tags = Tag::all();

        return view('pages.movie.create', compact('genres', 'tags'));
    }

    // METODO STORE: per ricezione dati da form:
    public function storeMovie(Request $request){

        $data = $request -> validate([

            'name' => 'required|string',
            'year' => 'required|integer|min:0',
            'cashOut' => 'required|integer|min:0',
            'genre_id' => 'required|integer|min:1',
            'tags_id' => 'nullable|array'
        ]);

        // Assegno genere, quindi:
        // creo movie senza buttarlo in DB:
        $movie = Movie:: make($data);
        // recupero genere in DB a partire dall'id:
        $genre = Genre:: find($data['genre_id']);
        // associo i due elementi:
        $movie -> genre()-> associate($genre);
        // salvo in DB:
        $movie-> save();

        // Assegno tag, quindi:
        $tags = Tag::find($data['tags_id']);
        $movie -> tags()-> attach($tags);

        return redirect()-> route('home');
    }

    // METODO DELETE:
    public function deleteMovie(Movie $movie){

        $movie ->tags()->sync([]);
        $movie-> delete();

        return redirect()-> route('home');
    }

    // METODO EDIT: per form con vecchi dati:
    public function editMovie(Movie $movie){

        $genres = Genre::all();
        $tags = Tag::all();

        return view('pages.movie.edit', compact('movie', 'genres', 'tags'));
    }

    public function updateMovie(Request $request, Movie $movie){
        $data = $request -> validate([

            'name' => 'required|string',
            'year' => 'required|integer|min:0',
            'cashOut' => 'required|integer|min:0',
            'genre_id' => 'required|integer|min:1',
            'tags_id' => 'nullable|array'
        ]);

        $movie -> update($data);

        $genre = Genre::find($data['genre_id']);
        $movie -> genre()-> associate($genre);

        $movie -> save();

        $tags = Tag::find($data['tags_id']);
        $movie -> tags() -> sync($tags);

        return redirect() -> route('home');
    }
}
