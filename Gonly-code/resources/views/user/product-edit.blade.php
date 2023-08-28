@extends('layouts.head-pretm')

@section('link-css-js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/user/form-products.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js', 'resources/css/layouts-css/footer-users.css'])
@endsection

@section('Welcome')
    Crear productos | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-loged')

    <main>
        
            {{ method_field('PATCH') }}
            @include('layouts.form-user-products', ['nameLook' => 'Edición de producto', 'actionForm' => url('/products/'.$products->id), 'methodForm' => method_field('PATCH'), 'submitForm' => 'Guardar cambios' ])

    </main>

    @include('layouts.footer-users')    
@endsection