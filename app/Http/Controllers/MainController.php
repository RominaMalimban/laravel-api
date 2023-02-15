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

        $genries = Genre:: all();
        return view('pages.home', compact('genries'));
    }
}
