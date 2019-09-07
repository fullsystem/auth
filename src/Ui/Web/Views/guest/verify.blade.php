@extends('ui::guest')

@section('page-title', __('Email Verification'))
@section('page-description', __('Verify Your Email Address.'))

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link btn-lg p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
    </form>
@endsection
