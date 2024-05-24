@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Language</h1>
    <form method="POST" action="{{ route('languages.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="default_included">Default Included</label>
            <select class="form-control" id="included" name="included" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Create Language</button>
    </form>
</div>
@endsection