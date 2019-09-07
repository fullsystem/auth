@extends('ui::guest')

@section('page-title', 'Reset your password')
@section('page-description', __("Don't worry! Please fill email and we will email you a password reset link."))

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
        @csrf

        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="false" placeholder="{{ __('Email') }}" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-secondary btn-lg btn-block">{{ __('Send Password Reset Link') }}</button>
            </div>
        </div>

        <hr class="mt-3" />

        <div class="row mb-4 mt-1">
            <div class="col-12 text-right">
                <a href="{{ route('login') }}">{{ __('Back to login') }}</a>
            </div>
        </div>
    </form>
@endsection
