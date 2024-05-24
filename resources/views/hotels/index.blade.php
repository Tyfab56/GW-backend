@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hotels</h1>
    <a href="{{ route('hotels.create') }}" class="btn btn-primary">Add New Hotel</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Title</th>
                <th>Email</th>
                <th>Pseudo</th>
                <th>Telephone</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotel->title }}</td>
                <td>{{ $hotel->email }}</td>
                <td>{{ $hotel->pseudo }}</td>
                <td>{{ $hotel->telephone }}</td>
                <td>{{ $hotel->website }}</td>
                <td>
                    <a href="{{ route('hotels.edit', $hotel) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('hotels.destroy', $hotel) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this hotel?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection