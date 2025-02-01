<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('pages.register');
    }

    public function welcomepage(Request $request){
        $lastname = $request->input("lastName");
        $firstname = $request->input("firstName");
        return view('pages.welcomepage', ['lastname' => $lastname, 'firstname' => $firstname]);
    }
}
