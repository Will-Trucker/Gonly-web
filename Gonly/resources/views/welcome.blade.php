@extends('layouts.head-pretm')

@section('link-css-js')
    @livewireStyles
    @vite(['resources/css/home/welcome.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js'])
@endsection

@section('Welcome')
    {{__('Start')}} | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')

    <section class="home-present" style="background-image: url( {{ Vite::asset('resources/img/Decoration/Curve-Line.svg') }} )">
        <section class="container-text-and-img-1">
            <div class="container-text1">
                <h1><b>{{__('Gonly')}}</b> {{__('is your best option')}}</h1>
                <p>{{__('To get what you need, just immerse yourself in our APP to find everything you want, what you want and when you want.')}}</p>
                <div>
                    <a href="">{{__('Offers of the day')}}</a>
                </div>
            </div>
            <article class="container-img" >
                <img src="{{ Vite::asset('resources/img/Decoration/ilustration-removebg-preview.png') }}" alt="">
            </article>  
        </section>
    </section>
    <main class="principal-content">
        <div class="famous-categories">
            <h2 class="h2-forall">{{__('Featured Categories')}}</h2>
            <div class="container-categorias">
                <a href="#">
                    <img src="{{ Vite::asset('resources/img/Categories/Accesories.png') }}" alt="">
                    <h3>{{__('Accessories')}}</h3>
                </a >
                
                <a href="">
                    <img src="{{ Vite::asset('resources/img/Categories/Beauty.png') }}" alt="">
                    <h3>{{__('Beauty')}}</h3>
                </a>

                <a href="#">
                    <img src="{{ Vite::asset('resources/img/Categories/Tecnology.png') }}" alt="">
                    <h3>{{__('Tecnology')}}</h3>
                </a>

                <a href="#">
                    <img src="{{ Vite::asset('resources/img/Categories/Clothes.png') }}" alt="">
                    <h3>{{__('Clothes')}}</h3>
                </a>

                <a href="#">
                    <img src="{{ Vite::asset('resources/img/Categories/Cosmetics.png') }}" alt="">
                    <h3>{{__('Cosmetics')}}</h3>
                </a>

                <a href="#">
                    <img src="{{ Vite::asset('resources/img/Categories/Footwear.png') }}" alt="">
                    <h3>{{__('Footwear')}}</h3>
                </a>
            </div>
        </div>

        <div class="famous__product-offer">
            <div>
                <h2 class="h2-forall modified-1">{{__('Most sold')}}</h2>
                <a href="#" class="all">{{__('See everything')}} <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <section class="container-categorias">

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                        <p>Iphone 18x MAX de 15 memorias de ram y 180 de almacenamiento interno core i3 8° generación.</p>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/fan.jpeg') }}" alt="Fan">
                        <h2>Ventilador DORCO</h2>
                        <p>Vendilador piola on una helice que puede cortar hasta a los negros y geis, es en serio....</p>
                    </a>
                    <div class="price-products-buyer">$75</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/shoes.jpeg') }}" alt="Shoes">
                        <h2>Zapatos Jordan</h2>
                        <p>Con estos zapatos el bicho metió unas buenas canastas conta los lakres, los humilló mucho.</p>
                    </a>
                    <div class="price-products-buyer">$350</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/sofa.jpeg') }}" alt="Sofa">
                        <h2>Zofa Umbro</h2>
                        <p>Este sofa ha tenido el mismísimo culo de lo que es el MmPapel y MesiNaldo, unas leyendas.</p>
                    </a>
                    <div class="price-products-buyer">$750</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/pc.png') }}" alt="PC">
                        <h2>PC Razer X-PRO</h2>
                        <p>Con esta pc, logré ganar Crea-J y tener 80 novias, como te quedas chaval, aprende de mi.</p>
                    </a>
                    <div class="price-products-buyer">$2,550</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

            </section>
        </div>

        <h2 class="h2-forall" style="margin-bottom: 35px;">{{__('Most liked')}}</h2>
        <section class="product">             
            <button class="pre-btn"><img src="{{ Vite::asset('resources/img/Images/arrow.png') }}"></button>
            <button class="nxt-btn"><img src="{{ Vite::asset('resources/img/Images/arrow.png') }}"></button>
            <div class="product-container">
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card1.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card2.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card3.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card4.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card5.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card6.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card7.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card8.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card9.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
                <div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">50% off</span>
                        <img src="{{ Vite::asset('resources/img/Images/card10.jpg') }}" class="product-thumb" alt="">
                        <button class="card-btn">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">Zapatos Clorts</h2>
                        <p class="product-short-description">Los mejores zapatos del mundo</p>
                        <span class="price">$20</span>
                    </div>
                </div>
            </div>
        </section>

        <div class="famous__product-offer modified-2">
            <div>
                <h2 class="h2-forall modified-1">{{__('Our recommended')}}</h2>
            </div>
            <section class="container-categorias">

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

                <div class="container__products-buyer">
                    <a href="#" class="image-product">
                        <img src="{{ Vite::asset('resources/img/Products/smartphone.png') }}" alt="Smartphone">
                        <h2>iPhone 18X MAX</h2>
                    </a>
                    <div class="price-products-buyer">$1.500</div>
                    <a class="car" href="#">Añadir al carrito <i class="fa-solid fa-cart-shopping"></i></a>
                </div>

            </section>
        </div>
    
    </main>
    
    <main class="principal-content">
        <div class="trending-month">
            <div>
                <h2 class="h2-forall">Noticias</h2>
            </div>
            <section class="container-categorias">

                <div class="trending__mont-1">
                    <div class="text">
                        <h2>Gran semana!</h2>
                        <p>¡Junio está lleno de sorpresas en Gonly! Del 22 al 30 de julio, únete a nuestra gran celebración de ofertas y descuentos exclusivos para todos.</p>
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
    @livewireScripts
@endsection