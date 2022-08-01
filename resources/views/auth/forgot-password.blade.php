@extends('layouts.app')

@section('content')
    <section class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">

        <div class="d-flex justify-content-center alig-items-center col-10 col-lg-3">
            <img src="/storage/deco/kana_megane.png" class="img-fluid" alt="Kana">
        </div>
        {{-- separation --}}
        <div class="d-flex justify-content-center container mb-5">
            <hr class="container m-0">
        </div>

        <div class="mb-4">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <div class="col-6">
            <!-- Session Status -->
            <x-auth-session-status class="mb-3" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-3" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
                <div class="mb-3">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-info">{{ __('Email Password Reset Link') }}</button>
                </div>
            </form>
        </div>
    </section>
@endsection
