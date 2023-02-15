<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // FK Movies-Genres:
        Schema::table('movies', function (Blueprint $table) {
            $table -> foreignId('genre_id')
                   -> constrained();
        });

        // FK Movie-Tag:
        Schema::table('movie_tag', function (Blueprint $table) {
            $table -> foreignId('movie_id')
                   -> constrained();
            $table -> foreignId('tag_id')
                   -> constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
