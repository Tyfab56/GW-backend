@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Language</h1>
    <form method="POST" action="{{ route('languages.update', $language) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $language->name }}" required>
        </div>

        <div class="form-group">
            <label for="included_in_default_subscription">Included in Default Subscription</label>
            <select class="form-control" id="included" name="included" required>
                <option value="1" {{ $language->included == 1 ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $language->included == 0 ? 'selected' : '' }}>No</option>

            </select>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($language->image)
            <img src="{{ asset('storage/' . $language->image) }}" alt="{{ $language->name }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Language</button>
    </form>
</div>
@endsection