@extends('layouts.master')
@section('title')
    Halaman Update Cast
@endsection

@section('content')
<form method="POST" action="/cast/{{ $cast->id }}">
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
      <label for="name">Cast Name</label>
      <input type="text" class="form-control" value="{{$cast->name}}" id="name" name="name" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" value="{{$cast->age}}" id="age" name="age" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="bio">Bio</label>
      <textarea name="bio" id="bio" class="form-control" cols="10" rows="10">{{$cast->bio}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection