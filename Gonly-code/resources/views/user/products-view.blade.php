@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/user/products-create.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js', 'resources/css/layouts-css/footer-users.css'])
@endsection

@section('Welcome')
    Productos | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-loged')

    <main>
        <div class="welcome-user" style="background-image: url({{ Vite::asset('resources/img/Decoration/create-products.jpg') }})">
            <h1>Mis publicaciones</h1>
            <p>Aquí se enlistan todos tus productos publicados para ventas dentro de Gonly!</p>
        </div>
        <a href="{{ route('products.create') }}">
            <article>
                <i class="fa-solid fa-circle-plus"></i>
                <h1>Agregar producto para tu venta!</h1>
                <p>Agrega un nuevo producto para vender y sumérgete en las oportunidades que Gonly te da!</p>
            </article>
        </a>

        @if (Session::has('message'))
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <i class="fa-solid fa-check" style="margin: 0px 10px 0px 15px"></i>
                <span class="sr-only">Info</span>
                <div>
                    <span class="text-lg">{{Session::get('message')}}</span>
                </div>
            </div>
        @endif
        
        @if ( $products->isEmpty() )
            <section class="not-registers">        
                <img src="{{ Vite::asset('resources/img/Decoration/nosearch-publish.png') }}" alt="">
                <h1>No se han encontrado productos a vender relacionados con esta cuenta</h1>
            </section> 
        @else
        <section>
            @foreach ( $products as $productsUser )
            <div>
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

            </div>
            @endforeach
        </section>
        @endif

        {!! $products->links() !!}
    </main>

    @include('layouts.footer-users')    
@endsection
