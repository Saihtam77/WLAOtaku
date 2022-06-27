@extends('layouts.app')

@section('content')
    <section class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mb-5">logo</h1>
        <form method="POST" action="{{ route('login') }}" class="col-6 col-lg-4">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3">
                <div class="form-check">
                    <x-checkbox id="remember_me" name="remember" />

                    <label class="form-check-label" for="remember_me">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="mb-0">
                <div class="d-flex justify-content-end align-items-baseline">
                    @if (Route::has('password.request'))
                        <a class="text-muted me-3" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button>
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </div>
        </form>
    </section>
@endsection
