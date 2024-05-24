<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenue sur Guest-Welcome</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('Adresse E-Mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Mot de Passe') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                {{ __('Connexion') }}
            </button>

            @if (Route::has('password.request'))
            <div class="text-center">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>

            </div>
            @endif
        </form>
    </div>
</body>

</html>