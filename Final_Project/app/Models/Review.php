<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['user_id', 'film_id', 'content', 'point'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
