<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table='genres';

    protected $fillable = ['name'];

    public function listFilm()
    {
        return $this->hasMany(Film::class,'genre_id');
    }
}
