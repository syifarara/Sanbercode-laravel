@extends('layouts.master')
@section('title')
    Halaman Update Genre
@endsection

@section('content')
<form method="POST" action="/genre/{{ $genre->id }}">
    @csrf

    @method('PUT')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" value="{{$genre->name}}" id="name" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection