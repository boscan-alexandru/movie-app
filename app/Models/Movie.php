<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'movies';

    protected $fillable = ['status', 'name', 'rating', 'description', 'image', 'delete_at'];

    public function artists(){
        return $this->belongsToMany(Artist::class, 'movie_artist', 'movie_id', 'artist_id');
    }

    /**
     * Defining Scopes
     */
    public function scopeVisible($query){
        return $query->where('status', 1);  // Movie::Visible()->get();
    }

    public function scopeInvisible($query){
        return $query->where('status', 2);  // Movie::Invisible()->get();
    }

    public function scopeVisibleOverFive($query){
        return $query->where('status', 1)->where('rating', '>', 5);  // Movie::VisibleOverFive()->get();
    }

    public function scopeRatingMoreThan($query, float $rating){
        return $query->where('rating', '>', $rating);  // Movie::RatingMoreThan(wherever__float_number)->get();
    }

    public function scopeRatingLessThan($query, float $rating){
        return $query->where('rating', '<', $rating);  // Movie::RatingLessThen(wherever__float_number)->get();
    }
}
