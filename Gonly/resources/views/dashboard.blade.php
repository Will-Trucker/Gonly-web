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
            <div class="div1-1">
                <section style="background-image: url({{ Vite::asset('resources/img/Decoration/productos.jpg') }})">
                    <h1>Tus compras</h1>
                    <p>Aquí se verán en general tus compras realizadas en Gonly!</p>
                </section>
                <article class="articulos">
                    <img src="{{ Vite::asset('resources/img/Decoration/no-sell.jpg') }}">
                    <p>Por el momento no tienes ningún registro de compra ligada a este usuario, puedes ver todo especial para ti, <a style="text-decoration: underline;" href="{{ route('welcome') }}">haz clic aquí.</a></p>
                </article>
            </div>
            <div class="div1-2">
                <section style="background-image: url({{ Vite::asset('resources/img/Decoration/ventas.jpg') }})">
                    <h1>Tus ingresos</h1>
                    <p>Aquí se verán en general tus ventas dentro de Gonly en Gonly!</p>
                </section>
                <article class="articulos">
                    <img src="{{ Vite::asset('resources/img/Decoration/no-buy.png') }}">
                    <p>Por el momento no tienes ningún registro de venta ligada a este usuario, pero puedes vender productos, <a style="text-decoration: underline;" href="{{ route('welcome') }}">haz clic aquí.</a></p>
                </article>
            </div>
            <div class="div1-3">
                <section style="background-image: url({{ Vite::asset('resources/img/Decoration/publicaciones.jpg') }})">
                    <h1>Tus publicaciones</h1>
                    <p>Aquí se visualizarán los productos a vender que has publicado dentro de Gonly!</p>
                </section>
                <especificaciones-producto>
                    <aside>
                        <h1>Tu Panel de productos</h1>
                    </aside>
                    <h2>Tienes <b>{{ $productCount }}</b> producto subidos en venta actualmente</h2>
                </especificaciones-producto>
                <article class="articulos">
                    @if ($products->isNotEmpty())
                        @foreach ( $products as $productsUser )
                            <contenedor-productos>
                                <h1>{{ $productsUser->tittle }}</h1>
                                <aside class="contenedor">
                                    <h5>{{ $productsUser->description }}</h5>
                                </aside>
                                {{--<p>{{ $productsUser->specifications }}</p>--}}
                                <h2>$ {{ $productsUser->price }}</h2>
                                <picture><img src="{{ asset('storage').'/'.$productsUser->photos }}" alt=""></picture>
                                <button onclick="window.location.href='{{ route('additional-view', ['id' => $productsUser->id]) }}'" class="learn-more">
                                    <span class="circle" aria-hidden="true">
                                        <span class="icon arrow"></span>
                                    </span>
                                    <span class="button-text">Más detalles</span>
                                </button>
                                {{--{!! $additionalView !!}--}}
                            </contenedor-productos>
                        @endforeach
                    @else
                        <img src="{{ Vite::asset('resources/img/Decoration/nosearch-publish.png') }}">
                        <p>Por el momento no tienes ningún registro de publicación de algún producto ligado a este usuario, pero puedes vender, <a style="text-decoration: underline;" href="{{ route('products.create') }}">haz clic aquí.</a></p>
                    @endif
                </article>
            </div>
        </section>
    </main>

    @include('layouts.footer-users')    
@endsection


