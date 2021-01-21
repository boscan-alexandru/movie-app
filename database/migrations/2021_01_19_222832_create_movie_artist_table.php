<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_artist', function (Blueprint $table) {

            /**
             * All the info about this can be found on laravel documentation here
             * https://laravel.com/docs/7.x/migrations#foreign-key-constraints
            **/

            /** NOT WRONG BUT IS MUCH BETTER THE BELOW METHOD
             * 
             * $table->unsignedBigInteger('artist_id');
             * $table->foreign('movie_id')->references('id')->on('movies');
             * 
             * $table->unsignedBigInteger('movie_id');
             * $table->foreign('artist_id')->references('id')->on('artists');
             * 
            **/ 

            /**
             * EVEN BETTER METHOD FROM A DEVELOPMENT PERSPECTIVE
            **/

            $table->foreignId('movie_id')->constrained('movies');
            // follows the convention ['table_id'], so we don't really need to specify the table here
            
            $table->foreignId('artist_id')->constrained('artists');
            // follows the convention ['table_id'], so we don't really need to specify the table here
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_artist');
    }
}
