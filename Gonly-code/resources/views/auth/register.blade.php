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
    <link rel="stylesheet" href="../CSS/registerUser.css">
    <title>Registro | Gonly</title>

    @vite(['resources/css/auth/register.css'])

</head>
<body style="background-image: url({{ Vite::asset('resources/img/Decoration/circle-scatter-haikei.svg') }});">
    
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}" class="form-register">
            @csrf
            <div class="logo-img">
                <img src="{{ Vite::asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
                <h2>Regístrate en Gonly</h2>
            </div>
            <div class="coolinput">
                <label for="name" class="text">Nombre</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Escriba su nombre" class="input">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="coolinput">
                <label for="email" class="text">E-mail</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Escriba su correo electrónico" class="input">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="coolinput">
                <label for="password" class="text">Contraseña</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Escriba su contraseña" class="input">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="coolinput">
                <label for="password_confirmation" class="text">Repita su contaseña</label>
                <input id="password_confirmation" type="password" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repita su contraseña" class="input">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="container-input-and-login">
                <input class="purchase-submit" type="submit" value="Regístrate">
                <h5>Ya tienes una cuenta? <a href="{{ Route('login') }}">Iniciar seción.</a></h5>
            </div>
        </form>
        <div class="form-decoration">
             <img src="{{ Vite::asset('resources/img/Decoration/register.png') }}">
        </div>
    </div>

</body>
</html>
