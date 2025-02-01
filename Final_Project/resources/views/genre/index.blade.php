@extends('layouts.master')
@section('title')
    Halaman Tampil Genre
@endsection

@section('content')
<a href="/genre/create" class="btn btn-sm btn-info my-3">Create</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($genre as $item)
        <tr>
            <th scope="row"></th>
            <td>{{ $item->name }}</td>
            <td>
              <form action="/genre/{{ $item->id }}" method="POST">
                <a href="/genre/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                <a href="/genre/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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