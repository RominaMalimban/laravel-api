<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Genre;
use App\Models\Movie;
class MainController extends Controller
{
    // Metodo HOME con lista movies:
    public function home(){

        $movies = Movie:: all();
        return view('pages.home', compact('movies'));
    }
}
