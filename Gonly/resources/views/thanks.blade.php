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
                <h1>{{__('¡Muchas gracias por comprar con nosotros! ')}} 
                    <b>{{__('Gonly')}}</b>
                </h1>
                <p>{{__('Gracias por tu preferencia, te esperamos nuevamente😄')}}</p>
                <div>
                <a href="{{ route('welcome') }}">{{__('Seguir comprando')}}</a>
                </div>
            </div>
            <article class="container-img home-img-cont">
                <img src="{{ Vite::asset('resources/img/Decoration/online-shop4-7089861_1280.png') }}" alt="">
            </article>
        </section>
    </section>
    </main>

    @include('layouts.footer-users')
@endsection
