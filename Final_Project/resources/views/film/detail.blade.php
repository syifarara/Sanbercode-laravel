@extends('layouts.master')
@section('title')
    Halaman Detail Film
@endsection

@section('content')
    <img src="{{ asset('uploads/'. $film->poster)}}" width="100%" alt="">
    <h1 class="text-primary">{{ $film->title }}</h1>
    <p>{{ $film->summary }}</p>
    <a href="{{ route('film.index')}}" class="btn btn-secondary btn-sm">Kembali</a>

    <hr>

    <h4 class="text-info">List Review</h4>

    @forelse ($film->review as $item)
        <div class="card mt-2">
            <div class="card-header">
                {{$item->createdBy->name}}
            </div>
            <div class="card-body">
                <strong></strong>Point ⭐ {{ $item->point }}/5
                <p class="card-text">{{$item->content}}</p>
            </div>
        </div>
    @empty
        <h4>Belum ada Review di Film ini</h4>
    @endforelse
   
    <hr>

    @auth
    <form action="/review/{{$film->id}}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="content" class="form-control" rows="30" cols="10" placeholder="Isi Review"></textarea>
        </div>

        <div class="form-group">
            <label>Point (1-5):</label>
            <select name="point" class="form-control">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <input type="submit" value="Kirim" class="btn btn-primary btn-sm btn-block">
    </form>
    @endauth
    
@endsection