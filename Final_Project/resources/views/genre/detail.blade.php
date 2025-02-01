@extends('layouts.master')
@section('title')
    Halaman Detail Genre
@endsection

@section('content')
<h1 class="text-primary">{{ $genre->name }}</h1>

<h4>List Film</h4>
<div class="row">

@forelse ($genre->listFilm as $item)
<div class="col-4">
    <div class="card">
        <img src="{{asset('uploads/'. $item->poster)}}" width="300px" height="200px" class="mx-auto" alt="...">
        <div class="card-body">
            <h3>{{$item->title}}</h3>
            <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
            <a href="{{ route('film.show', $item->id) }}" class="btn btn-primary btn-sm btn-block">Read More</a>
        </div>
    </div>
</div>
@empty
    <h5>Tidak ada film di genre</h5>
@endforelse
</div>

<a href="/genre" class="btn btn-secondary btn-sm">Kembali</a>

@endsection