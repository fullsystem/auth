@extends('ui::guest')

@section('page-title', __('Register'))
@section('page-description', __("It's simple! Just fill the fields below to create your account and sign in."))

@section('content')
    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf

        <div class="input-group mb-3">
            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="false" placeholder="{{ __('Name') }}" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

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

        <div class="row">
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-secondary btn-lg btn-block">{{ __('Register') }}</button>
            </div>
        </div>

        <hr class="mt-3 mb-3" />

        <div class="row">
            <div class="col-12 text-right">
                <a href="{{ route('login') }}">{{ __('Back to login') }}</a>
            </div>
        </div>
    </form>
@endsection
