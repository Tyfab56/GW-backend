@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <a href="{{ route('hotels.index') }}" class="btn btn-primary">Hotel Backoffice</a>
                    <a href="{{ route('languages.index') }}" class="btn btn-primary">Langue Backoffice</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection