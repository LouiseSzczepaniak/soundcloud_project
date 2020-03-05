<h2>{{ __('Créer un compte') }}</h2>
    <div class="infos">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="uneinfo">
                <label for="name">{{ __('Pseudo') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="uneinfo">
                <label for="email">{{ __('Adresse email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="uneinfo">
                <label for="password">{{ __('Mot de passe') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="uneinfo">
                <label for="password-confirm">{{ __('Confirmer mot de passe') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="valider">
                <button type="submit" class="btn btn-primary">
                    {{ __('Créer un compte') }}
                </button>
            </div>

        </form>
    </div>
