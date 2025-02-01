@extends('layouts.master')
@section('title')
    Halaman Utama
@endsection

@section('content')
    <h1>Buat Account Baru!</h1>
    <h3>Sign Up Form</h3>

    <form action="/welcomepage" method="POST">
        @csrf
        <label>First name:</label><br><br>
        <input type="text" name="firstName" id="firstName"><br><br>

        <label>Last name:</label><br>
        <input type="text" name="lastName" id="lastName"><br><br>

        <label>Gender:</label><br>
        <input type="radio" name="gender-male" id="gender-male">Male<br>
        <input type="radio" name="gender-female" id="gender-female">Female<br>
        <input type="radio" name="gender-other" id="gender-other">Other<br>
        <br>

        <label>Nationality:</label><br>
        <select name="nationality">
            <option value="Indonesian">Indonesian</option>
            <option value="Korean">Korean</option>
            <option value="American">American</option>
        </select><br>
        <br>

        <label>Language Spoken:</label><br>
        <input type="checkbox" name="indonesia" id="indonesia">Bahasa Indonesia<br>
        <input type="checkbox" name="english" id="english">English<br>
        <input type="checkbox" name="other" id="other">Other<br>
        <br>

        <label>Bio:</label><br><br>
        <textarea name="bio" rows="10" cols="20"></textarea><br><br>
        
        <button name="submit" id="submit">Sign up</button><br>
    </form>
@endsection