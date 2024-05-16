@extends('layouts.head-pretm')

@section('link-css-js')
    @livewireStyles
    @vite(['resources/css/home/information.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js', 'resources/css/home/categories.css' ])
@endsection

@section('Welcome')
    Information | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')

    
 <main>    
            <article>
                <div>
                    <h2>Informacion</h2>
                </div>
            </article>
<div id="about-main">
    <div class="jumbotron">
        <div class="jumbotron-inner">
            <div class="top-box">
                <div class="content-box">
                    <h1>
                        Acerca de nosotros
                    </h1>
                    <p class="p_20_px">
                        ¡Bienvenidos a Gonly! Somos mucho más que una plataforma de compras en línea; somos el puente que conecta a emprendedores y comerciantes salvadoreños con un vasto mundo de oportunidades de compras y ventas digitales. En un muno en constante evolución, estamos aquí para simplificar y asegurar tu experiencia de compra y venta en línea.
                    </p>
                </div>
            </div>
        </div>
       
    </div>
    <div class="story-container">
        <div class="need-for-dx-container">
            <h3 class="text-center">
                Mision
            </h3>
            <p class="p_20_px">
                En Gonly, tenemos el firme compromiso de fomentar el comercio en El Salvador de una manera fácil y segura. Nuestra misión es proporcionar una plataforma confiable que satisfaga las necesidades de todos nuestros usuarios, permitiendo que emprendedores recién llegados al mundo digital encuentren su lugar, mientras brindamos a los comerciantes veteranos una vía confiable para expandir sus operaciones. Nos esforzamos por facilitar el comercio en línea, promoviendo la seguridad en todas las transacciones. Creemos que la innovación constante es esencial para brindar a nuestros usuarios una experiencia superior en nuestra plataforma. Nuestra misión va más allá de ser una simple plataforma; queremos ser la respuesta que los nuevos y experimentados comerciantes electrónicos necesitan en un mundo digital en constante cambio.

            </p>
        </div>
        <div class="container-divider"></div>
        <div class="our-tech-container">
            <h3 class="text-center">
                Visión 
            </h3>
            <p class="p_20_px">
                Convertir a Gonly en un centro de comercio electrónico próspero y seguro. Queremos que los emprendedores prosperen y confíen en cada transacción en línea realizada con nosotros. Nuestra visión es un entorno donde la satisfacción del cliente sea nuestra máxima prioridad y el comercio en línea sea un motor de progreso económico para todos en el país. donde cada compra en línea sea una experiencia segura y gratificante, y donde el comercio en línea sea un motor de progreso económico no solo para los comerciantes, sino para toda la comunidad de nuestro país.

            </p>
            <div class="img-container">
                <img src="{{ Vite::asset('resources/img/Logos/logo-gonly-black-letters.png') }}" alt="" class="img-responsive" width="80%"/>
            </div>
        </div>
        <div class="origin-story-container">
            <p class="p_20_px">
                En Gonly, creemos en el potencial del comercio electrónico para transformar la economía de El Salvador. Estamos enfocados en proporcionar una plataforma segura, fácil de usar y confiable que no solo haga crecer tus negocios, sino que también inspire confianza en cada transacción. Nos enorgullece respaldar a los emprendedores que dan sus primeros pasos en el mundo digital, así como a los comerciantes experimentados que buscan expandirse. Nos esforzamos por promover el comercio local y contribuir al progreso económico de nuestro país.

            </p>
            <p class="p_20_px">
                Te invitamos a unirte a nosotros en este emocionante viaje hacia un futuro de éxito y crecimiento en línea. Explora nuestra tienda, descubre oportunidades y siente la diferencia con Gonly. ¡Es un placer tenerte aquí!
            </p>
        </div>
        <div class="container-divider"></div>
    </div>
</div>  
</main>

<script> 'use strict';

			$(document).ready(function () {
				$(window).bind('scroll', function (e) {
					parallaxScroll();
				});
			});
			
			function parallaxScroll() {
				const scrolled = $(window).scrollTop();
				$('#team-image').css('top', (0 - (scrolled * .20)) + 'px');
				$('.img-1').css('top', (0 - (scrolled * .35)) + 'px');
				$('.img-2').css('top', (0 - (scrolled * .05)) + 'px');
			}
            </script>

    @include('layouts.footer-users')
    @livewireScripts
@endsection