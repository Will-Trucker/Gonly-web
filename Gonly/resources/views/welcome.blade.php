@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/welcome.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js'])
@endsection

@section('Welcome')
    {{__('Start')}} | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')

    <section class="home-present" style="background-image: url( {{ Vite::asset('resources/img/Decoration/Curve-Line.svg') }} )">
        <section>
            <div class="texto_principal3">
                <h1><b>{{__('Gonly')}}</b> {{__('is your best option')}}</h1>
                <p>{{__('To get what you need, just immerse yourself in our APP to find everything you want, what you want and when you want.')}}</p>
                <div>
                    <a href="">{{__('Offers of the day')}}</a>
                </div>
            </div>
            <article class="container-img home-img-cont">
                <img src="{{ Vite::asset('resources/img/Decoration/ilustration-removebg-preview.png') }}" alt="">
            </article>  
        </section>
    </section>
    <main class="principal-content">
        <div class="famous-categories">
            <h2 class="h2-forall">{{__('Featured Categories')}}</h2>
            <div>
                @php
                    $otrocontador = 0;
                @endphp

                @foreach ($categorías as $categoría)
                    @if ($otrocontador < 6)
                        <a href="#">
                            <img src="{{ asset('uploads/category/thumb/'.$categoría->image) }}" alt="">
                            <h3>{{ $categoría->name }}</h3>
                        </a >
                        @php
                            $otrocontador++;
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>

        <div class="famous__product-offer">
            <div>
                <h2 class="h2-forall modified-1">{{__('Most sold')}}</h2>
            </div>
            <section>
            @php
                $contador = 0;
            @endphp

            @foreach ($productos as $producto)
                @if ($contador < 4)
                    <div class="container__products-buyer">
                        <a href="#" class="image-product">
                            <img src="{{ asset('storage/' . $producto->photos) }}" alt="{{ $producto->tittle }}">
                            <h2>{{ $producto->tittle }}</h2>
                            <p>{{ $producto->description }}</p>
                        </a>
                        <div class="price-products-buyer">${{ $producto->price }}</div>
                        <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    @php
                        $contador++;
                    @endphp
                @endif
            @endforeach
            </section>
        </div>

        <h2 class="h2-forall texto_most_liked" style="margin-bottom: 35px;">{{__('Most liked')}}</h2>
        <section class="product">             
            <button class="pre-btn"><img src="{{ Vite::asset('resources/img/Images/arrow.png') }}"></button>
            <button class="nxt-btn"><img src="{{ Vite::asset('resources/img/Images/arrow.png') }}"></button>
            <div class="product-container">
                @php
                    $elementosMostrados = [];
                    $contador = 0;
                @endphp
                @foreach ($productos as $producto)
                    @if (!in_array($producto->id, $elementosMostrados) && $contador < 10)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('storage/' . $producto->photos) }}" alt="{{ $producto->tittle }}">
                            <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                        <div class="product-info">
                            <h2 class="product-brand">{{ $producto->tittle }}</h2>
                            <p class="product-short-description">{{ $producto->description }}</p>
                            <span class="price">{{$producto->price}}</span>
                        </div>
                    </div>
                        @php
                            $elementosMostrados[] = $producto->id;
                            $contador++;
                        @endphp
                    @endif
                @endforeach
            </div>
        </section>

        <div class="famous__product-offer modified-2">
            <div>
                <h2 class="h2-forall modified-1">{{__('Our recommended')}}</h2>
            </div>
            <section>

            @php
                $otrocontadorrandom = 0;
            @endphp

            @foreach ($productos as $producto)
                @if ($otrocontadorrandom < 14)
                    <div class="container__products-buyer">
                        <a href="#" class="image-product">
                            <img src="{{ asset('storage/' . $producto->photos) }}" alt="{{ $producto->tittle }}" alt="Smartphone">
                            <h2>{{ $producto->tittle }}</h2>
                        </a>
                        <div class="price-products-buyer">{{ $producto->price }}</div>
                        <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                    </div>
                    @php
                        $otrocontadorrandom++;
                    @endphp
                @endif
            @endforeach

            </section>
        </div>
    
    </main>
    
    <main class="principal-content">
        <div class="trending-month">
            <div>
                <h2 class="h2-forall">{{__('News')}}</h2>
            </div>
            <section>

                <div class="trending__mont-1">
                    <div class="text">
                        <h2>{{__('Gran semana!')}}</h2>
                        <p>{{__('')}}¡Junio está lleno de sorpresas en Gonly! Del 22 al 30 de julio, únete a nuestra gran celebración de ofertas y descuentos exclusivos para todos.</p>
                    </div>
                    <div class="trending__month-image-1">
                        <img src="{{ Vite::asset('resources/img/Decoration/juny.jpg') }}" alt="">
                    </div>
                </div>

                <div class="trending__mont-1">
                    <div class="trending__month-image-1">
                        <img src="{{ Vite::asset('resources/img/Decoration/creation.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h2 class="aprox">Estamos a un paso!</h2>
                        <p>Próximamente se acerca un evento en la cual Gonly aprovechará para estar de fiesta contigo, incluyendo nuestro gran lanzamiento y grandes descuentos que trae consigo.</p>
                    </div>
                </div>

                <div class="trending__mont-1">
                    <div class="trending__month-image-1">
                        <img src="{{ Vite::asset('resources/img/Decoration/august.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h2 class="aprox">Agosto regresó</h2>
                        <p>Durante este grandioso mes, Gonly celebra lo que son las fiestas agostinas, lo que también trae consigo muchos descuentos y nuevos productos para tu verano.</p>
                    </div>
                </div>

                <div class="trending__mont-1">
                    <div class="text">
                        <h2>Julio está cerca</h2>
                        <p>Julio está cada vez más presente en nustros días, celebra con nosotros este mes, la cual estaremos llenos de productos ideales para tó, solo los encuentras en Gonly, tu mejor opción!</p>
                    </div>
                    <div class="trending__month-image-1">
                        <img src="{{ Vite::asset('resources/img/Decoration/july.jpg') }}" alt="">
                    </div>
                </div>

            </section>
        </div>

    </main>

    @include('layouts.footer-users')
@endsection