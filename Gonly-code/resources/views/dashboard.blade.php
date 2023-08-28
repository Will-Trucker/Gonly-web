@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/dashboard.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js',  'resources/css/layouts-css/footer-users.css'])
@endsection

@section('Welcome')
    Panel | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-loged')

    <main>
        <div class="welcome-user" style="background-image: url({{ Vite::asset('resources/img/Decoration/welcome-user.jpg') }})">
            <h1>Bienvenido {{ Auth::user()->name }}</h1>
            <p>Da un vistazo de las posibilidades que tienes con Gonly, para compra y venta, adelante!</p>
        </div>
        <section class="grid-containers-balanced">
            <div>
                <section style="background-image: url({{ Vite::asset('resources/img/Decoration/productos.jpg') }})">
                    <h1>Tus compras</h1>
                    <p>Aquí se verán en general tus compras realizadas en Gonly!</p>
                </section>
                <article>
                    <img src="{{ Vite::asset('resources/img/Decoration/no-sell.jpg') }}">
                    <p>Por el momento no tienes ningún registro de compra ligada a este usuario, puedes ver todo especial para ti, <a style="text-decoration: underline;" href="{{ route('welcome') }}">haz clic aquí.</a></p>
                </article>
            </div>
            <div>
                <section style="background-image: url({{ Vite::asset('resources/img/Decoration/ventas.jpg') }})">
                    <h1>Tus ingresos</h1>
                    <p>Aquí se verán en general tus ventas dentro de Gonly en Gonly!</p>
                </section>
                <article>
                    <img src="{{ Vite::asset('resources/img/Decoration/no-buy.png') }}">
                    <p>Por el momento no tienes ningún registro de venta ligada a este usuario, pero puedes vender productos, <a style="text-decoration: underline;" href="{{ route('welcome') }}">haz clic aquí.</a></p>
                </article>
            </div>
            <div>
                <section style="background-image: url({{ Vite::asset('resources/img/Decoration/publicaciones.jpg') }})">
                    <h1>Tus publicaciones</h1>
                    <p>Aquí se visualizarán los productos a vender que has publicado dentro de Gonly!</p>
                </section>
                <article>
                    <img src="{{ Vite::asset('resources/img/Decoration/nosearch-publish.png') }}">
                    <p>Por el momento no tienes ningún registro de publicación de algún producto ligado a este usuario, pero puedes vender, <a style="text-decoration: underline;" href="{{ route('products.create') }}">haz clic aquí.</a></p>
                </article>
            </div>
        </section>
    </main>

    @include('layouts.footer-users')    
@endsection


