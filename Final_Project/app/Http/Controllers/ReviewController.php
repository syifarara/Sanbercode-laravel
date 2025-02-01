<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $film_id)
    {
        $user_id = Auth::id();

        $request->validate([
            'content' => 'required',
            'point' => 'required|integer|max:10',
        ]);

        Review::create([
            'user_id' => $user_id,
            'film_id' => $film_id,
            'content' => $request->input("content"),
            'point' => $request->input("point"),
        ]);

        return redirect('/film/'. $film_id);
    }
}
