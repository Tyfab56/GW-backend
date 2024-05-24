@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Languages for {{ $hotel->title }}</h1>
    <form method="POST" action="{{ route('hotels.languages.store', $hotel) }}">
        @csrf
        <div class="form-group">
            <label for="languages">Choix des langues</label>
            <select class="form-control" id="languages" name="languages[]" multiple>
                @foreach($languages as $language)
                <option value="{{ $language->id }}" {{ in_array($language->id, $hotelLanguages) ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Sauver Langues</button>
    </form>
</div>
@endsection