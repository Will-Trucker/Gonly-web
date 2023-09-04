@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js', 'resources/css/card-products/style.css','resources/img/Card__Product-1.png',])
@endsection

@section('Welcome')
| Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        
    </main>
</main>
@include('layouts.footer-users')
@endsection