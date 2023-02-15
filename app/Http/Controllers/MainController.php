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
        return view('pages.movie.create');
    }

    // METODO STORE: per ricezione dati da form:
    public function storeMovie(Request $request){

        $data = $request -> validate([

            'name' => 'required|string|max:64',
            'year' => 'required|integer',
            'cashOut' => 'required|integer',
        ]);

        // return view($data);
    }
}
