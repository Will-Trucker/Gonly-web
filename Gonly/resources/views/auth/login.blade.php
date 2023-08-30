<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/img/Logos/logo-gonly-icon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8dd3c39186.js" crossorigin="anonymous"></script>
    <title>Ingreso | Gonly</title>

    @vite(['resources/css/auth/login.css'])

</head>
<body style="background-image: url( {{ Vite::asset('resources/img/Decoration/ssspot.svg') }} );">
    <div class="form-container">
        <form method="POST" action="{{ route('login') }}" class="form-login">
            @csrf
            <div class="logo-img">
                <img src="{{ Vite::asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
                <h2>Iniciar seción en Gonly</h2>
            </div>
            <div class="coolinput">
                <label for="email" class="text">E-mail</label>
                <input id="email" type="email" name="email" placeholder="Escriba su correo electrónico" class="input" :value="old('email')" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="coolinput">
                <label for="password" class="text">Contraseña</label>
                <input type="password" id="password" placeholder="Escriba su contraseña" class="input" type="password" name="password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="block mt-4" style="margin-bottom: 15px">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Recuerdame siempre</span>
                </label>
            </div>
            <x-auth-session-status class="mb-4" style="margin-bottom: 15px" :status="session('status')" />
            <div class="container-input-and-login">
                <input class="purchase-submit" type="submit" value="Ingresar">
                <h>No tienes una cuenta? <a href="{{ Route('register') }}">Regístrate</a></h>
                <br>
                @if (Route::has('password.request'))
                    <h4><a href="{{ route('password.request') }}">Olvidaste tu contraseña?</h3></a>
                @endif
            </div>
        </form>
        <div class="form-decoration">
             <img src="{{ Vite::asset('resources/img/Decoration/man-shopping-at-online-store-from-smartphone-free-vector-removebg-preview.png') }}">
        </div>
        
    </div>

</body>
</html>



