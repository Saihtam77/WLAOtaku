@extends('layouts.app')
@section('content')
  
    <section class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mb-5">logo</h1>
        <form method="POST" action="{{ route('register') }}" class=" col-6 col-lg-4">
            @csrf   

            <!-- Name -->
            <div class="mb-3">
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" type="password"
                                name="password_confirmation" required />
            </div>

            <div class="mb-0">
                <div class="d-flex justify-content-end align-items-baseline">
                    <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button>
                        {{ __('Register') }}
                    </x-button>
                </div>
            </div>
        </form>
    </section>
 
@endsection
