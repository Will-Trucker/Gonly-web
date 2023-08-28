@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/auth/forgot-password.css'])
@endsection

@section('Welcome')
    Contraseña | Gonly
@endsection

@section('content-everyone')
    <body style="background-image: url( {{ Vite::Asset('resources/img/decoration/scattered.svg') }}  )">
        <div class="principal-container">
            <section>
                <img src="{{ Vite::Asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
                <h1>Reestablecimiento de contraseña</h1>
            </section>
            <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                    <label for="email">Escriba su correo electrónico</label>
                    <input class="email-insert" id="email" type="email" name="email" :value="old('email')" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <button type ="submit">{{ __('Email Password Reset Link') }}</button>
            </form>
        </div>
    </body>
@endsection
