@extends('layouts.master')
@section('title')
    Halaman Tambah Film
@endsection

@section('content')
<form action="{{route('film.store')}}" method="POST" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @csrf
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label>Summary</label>
        <textarea class="form-control" name="summary" cols="30" rows="10">{{ old('summary') }}</textarea>
    </div>
    <div class="form-group">
        <label>Release Year</label>
        <input type="number" name="release_year" class="form-control" value="{{ old('release_year') }}">
    </div>
    <div class="fomr-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control">
            <option value="">--Pilih Genre--</option>
            @forelse ($genres as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty
                <option value="">Belum ada Genre</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label>Poster</label>
        <input type="file" name="poster" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection