@extends('ui::guest')

@section('page-title', 'Login')
@section('page-description', __('Welcome! Please fill email and password to sign in in your account.'))

@section('content')
    <form method="POST" action="{{ route('login') }}" autocomplete="off">
        @csrf

        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="false" placeholder="{{ __('Email') }}" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="input-group">
            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        @if (Route::has('password.request'))
            <div class="row mb-4 mt-1">
                <div class="col-12 text-right">
                    <a href="{{ route('password.request') }}">{{ __('I forgot my password') }}</a>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-secondary btn-lg btn-block btn-flat">{{ __('Sign In') }}</button>
            </div>
        </div>
    </form>

    @if (Route::has('register'))
        <hr class="mt-4" />

        <p class="mt-3">
            <a href="{{ route('register') }}" class="text-center">{{ __('Register a new membership') }}</a>
        </p>
    @endif
@endsection