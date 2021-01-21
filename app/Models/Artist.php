<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'artists';

    protected $fillable = ['name', 'title'];

    public function movies(){
        return $this->belongsToMany(Movie::class, 'movie_artist', 'movie_id', 'artist_id');
    }

    /**
     * Defining Scopes
     */

    public function scopeArtistType($query, String $artistType){
        return $query->where('title', $artistType);  // Artist::ArtistType('whatever_string_type_artist')->get();
    }
}
