<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Genre;
use App\Models\Movie;
class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movie::factory()-> count(30) -> make()-> each(function($m){
            // recupero genere casuale:
            $genre = Genre:: inRandomOrder() -> first();
            // lo assegno a movie:
            $m -> genre() -> associate($genre);
            // salvo
            $m -> save();

            // ora devo valorizzare la tabella ponte movie_tag:
            $tags = Tag:: inRandomOrder()-> limit(5) -> get();
            $m-> tags()-> attach($tags);
        });
    }
}
