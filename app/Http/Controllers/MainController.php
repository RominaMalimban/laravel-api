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

            'name' => 'required|string|max:64',
            'year' => 'required|integer',
            'cashOut' => 'required|integer',
            'genre_id' => 'required|integer',
            'tags' => 'required|array'
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
        $tags = Tag::find($data['tags']);
        $movie -> tags()-> attach($tags);

        return redirect()-> route('home');
    }

    // METODO DELETE:
    public function deleteMovie(Movie $movie){

        $movie ->tags()->sync([]);
        $movie-> delete();

        return redirect()-> route('home');
    }
}
