@extends('layouts.master')
@section('title')
    Halaman Tampil Cast
@endsection

@section('content')
<a href="/cast/create" class="btn btn-sm btn-info my-3">Create</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($cast as $pemeran)
        <tr>
            <th scope="row">1</th>
            <td>{{ $pemeran->name }}</td>
            <td>
              <form action="/cast/{{ $pemeran->id }}" method="POST">
                <a href="/cast/{{$pemeran->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/cast/{{$pemeran->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                  @csrf
                  @method('DELETE')

                  <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
            @empty
            <p>No users</p>
        @endforelse
    </tbody>
  </table>
@endsection