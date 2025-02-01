@extends('layouts.master')
@section('title')
    Halaman Detail Cast
@endsection

@section('content')
<h1 class="text-primary">{{ $cast->name }}</h1>
<p>{{ $cast->bio}}</p>
@endsection