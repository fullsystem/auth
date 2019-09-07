@extends('ui::guest')

@section('page-title', __('Reset your password'))
@section('page-description', __("Almost there! Please fill password and we will email you a password reset link."))

@section('content')
    <form method="POST" action="{{ route('login') }}" autocomplete="off">
        <input type="hidden" name="token" value="{{ $token }}" />
        @csrf

        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="false" placeholder="{{ __('E-Mail Address') }}" autofocus>

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

        <div class="input-group">
            <input id="password-confirm" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="current-password">

            @error('password_confirmation')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-secondary btn-lg btn-block">{{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
@endsection
