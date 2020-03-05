<h2> Connexion </h2>
    <div class="infos">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="uneinfo">
                <label for="email"> Adresse email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div lcass="uneinfo">
                <label for="password"> Mot de passe </label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="rememberme">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember"> Se souvenir de moi </label>
            </div>

            <div class="valider">
                <button type="submit" class="btn btn-primary"> Se connecter </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}"> Tu as oublié ton mot de passe ? </a>
                @endif
            </div>

        </form>
    </div>
