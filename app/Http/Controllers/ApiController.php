<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Tag;

use App\Mail\NewMovie;
class ApiController extends Controller
{
   
    public function getMovieWTagWGenre() {

        $movies = Movie :: with('tags') 
            -> orderBy('created_at', 'desc')
            -> get();
        $genres = Genre :: all();
        $tags = Tag :: all();

        return response() -> json([
            'success' => true,
            'response' => [
                'movies' => $movies,
                'genres' => $genres,
                'tags' => $tags,
            ]
        ]);
    }

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
        if (array_key_exists('tags_id', $data)) {

            $tags = Tag :: find($data['tags_id']);
            $movie -> tags() -> sync($tags);
        }

        return response() -> json([
            'success' => true,
            'response' => $movie,
            'data' => $request -> all()
        ]);
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

        if (array_key_exists('tags_id', $data)) {

            $tags = Tag :: find($data['tags_id']);
            $movie -> tags() -> sync($tags);
        }

        return response() -> json([
            'success' => true,
            'response' => $movie,
            'data' => $request -> all()
        ]);
    }

    public function deleteMovie(Movie $movie) {

        $movie -> tags() -> sync([]);
        $movie -> delete();

        return response() -> json([
            'success' => true
        ]);
    }
    
}
