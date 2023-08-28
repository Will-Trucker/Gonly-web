@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/auth/verify-email.css'])
@endsection

@section('Welcome')
    Verificación | Gonly
@endsection

@section('content-everyone')
<body style="background-image: url( {{ Vite::Asset('resources/img/decoration/scattered.svg') }}  )">
    <div class="principal-container">

        <section>
            <img src="{{ Vite::Asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
            <h1>Verificación de correo electrónico</h1>
        </section>

        <div class="text-information">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
    
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
    
        <div class="container-buttons">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
    
                <div>
                    <x-primary-button>
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </div>
            </form>
    
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>  
    </div>
</body>

@endsection

