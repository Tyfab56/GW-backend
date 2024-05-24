@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Languages</h1>
    <a href="{{ route('languages.create') }}" class="btn btn-primary">Add New Language</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Default Included</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($languages as $language)
            <tr>
                <td>{{ $language->name }}</td>
                <td>{{ $language->included ? 'Yes' : 'No' }}</td>
                <td>
                    @if($language->image)
                    <img src="{{ asset('storage/' . $language->image) }}" alt="{{ $language->name }}" width="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('languages.edit', $language) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('languages.destroy', $language) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this language?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection