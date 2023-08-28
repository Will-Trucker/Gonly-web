@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/auth/reset-password.css'])
@endsection

@section('Welcome')
    Restablecer | Gonly
@endsection

@section('content-everyone')
<body style="background-image: url( {{ Vite::Asset('resources/img/decoration/scattered.svg') }}  )">
    <div class="principal-container">
        <section>
            <img src="{{ Vite::Asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
            <h1>Creación de nueva contraseña</h1>
        </section>
        <p>A travéz de estos campos, usted podrá crear su nueva contraseña, por favor inserte los datos solicitados para llevar a cabo este debido proceso.</p>
        
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
    
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <label for="email">Su correo electrónico</label>
            <input class="email-insert" id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
    
            <label for="password">{{__('Password')}}</label>
            <input class="email-insert" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
    
            <label for="password_confirmation">{{__('Confirm Password')}}</label>
            <input class="email-insert" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
    
        </form>
    </div>
</body>
    
@endsection

<!--

-->
