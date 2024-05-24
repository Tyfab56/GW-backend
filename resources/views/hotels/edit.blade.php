@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Hotel</h1>
    <form method="POST" action="{{ route('hotels.update', $hotel) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $hotel->title }}" required>
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="text" class="form-control" id="logo" name="logo" value="{{ $hotel->logo }}">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $hotel->address }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $hotel->email }}" required>
        </div>
        <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $hotel->telephone }}">
        </div>
        <div class="form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ $hotel->website }}">
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" value="{{ $hotel->pseudo }}" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <small>Leave blank to keep the current password</small>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Update Hotel</button>
    </form>
</div>
@endsection