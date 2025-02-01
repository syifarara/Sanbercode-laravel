@extends('layouts.master')
@section('title')
    Halaman Tampil Film
@endsection

@section('content')
<a href="{{route('film.create')}}" class="btn btn-primary btn-sm mb-6">Tambah</a>

<div class="row mt-5">
    @foreach ($film as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('uploads/'. $item->poster)}}" width="300px" height="200px" class="mx-auto" alt="...">
            <div class="card-body">
                <h3>{{$item->title}}</h3>
                <span class="badge badge-success">{{$item->genre->name}}</span>
                <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
                <a href="{{ route('film.show', $item->id) }}" class="btn btn-primary btn-sm btn-block">Read More</a>
                <div class="row my-3">
                    <div class="col">
                        <a href="{{ route('film.edit', $item->id) }}" class="btn btn-warning btn-sm btn-block">Edit</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('film.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection