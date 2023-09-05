@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js','resources/img/Card__Product-1.png','resources/css/card-products/product-view.css','resources/js/index.js','resources/img/2.jpg','resources/img/1.png'])
@endsection

@section('Welcome')
| Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <div class="container-main1">
            <div class="container-main2">
                <div class="container-img">
                <div class="container-all">
                    <input type="radio" id="1" name="image-slide" hidden>
                    <input type="radio" id="2" name="image-slide" hidden>
                    <input type="radio" id="3" name="image-slide" hidden>
                    <div class="slide">
                        <div class="item-slide">
                            <img src="{{Vite::asset('resources/img/1.png')}}">
                        </div>
                        <div class="item-slide">
                            <img src="{{Vite::asset('resources/img/2.jpg')}}">
                        </div>
                        <div class="item-slide">
                            <img src="{{Vite::asset('resources/img/1.png')}}">
                        </div>
                    </div>
                    <div class="pagination">
                        <label class="pagination-item" for="1">
                            <img src="{{Vite::asset('resources/img/1.png')}}">
                        </label>
                        <label class="pagination-item" for="2">
                            <img src="{{Vite::asset('resources/img/2.jpg')}}">
                        </label>
                        <label class="pagination-item" for="3">
                            <img src="{{Vite::asset('resources/img/1.png')}}">
                        </label>
                    </div>
                </div>
                </div>
                    <div class="container-info-product">
                        <div class="container-titulo">
                            <span>Zapatos</span> 
                        </div>
                        <div class="container-description">
                            <div class="title-description">
                                <h4>Descripción General</h4>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <div class="text-description">
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                    elit. Laboriosam iure provident atque voluptatibus
                                    reiciendis quae rerum, maxime placeat enim cupiditate
                                    voluptatum, 
                                </p>
                            </div>
                        </div>
                        <div class="container-price">
                            <span>$95.00</span>  
                        </div>	
                        <div class="container-add-cart">
                            <div>
                            </div>
                            <div class="container-quantity">
                                <input type="number" placeholder="1" value="1" min="1" class="input-quantity">
                                <div class="btn-increment-decrement">
                                    <i class="fa-solid fa-chevron-up" id="increment"></i>
                                    <i class="fa-solid fa-chevron-down" id="decrement"></i>
                                </div>
                            </div>
                            <button class="btn-add-to-cart">
                                <i class="fa-solid fa-plus"></i>
                                Añadir al carrito
                            </button>
                        </div>	
                        <div class="container-additional-information">
                            <div class="title-additional-information">
                                <h4>Especificaciones</h4>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <div class="text-additional-information hidden">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing
                                    elit. Laboriosam iure provident atque voluptatibus
                                    reiciendis quae rerum, maxime placeat enim cupiditate
                                    voluptatum, temporibus quis iusto. Enim eum qui delectus
                                    deleniti similique? Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit. Sint autem magni earum est
                                    dolorem saepe perferendis repellat ipsam laudantium cum
                                    assumenda quidem quam, vero similique? Iusto officiis
                                    quod blanditiis iste?</p>
                            </div>
                        </div>
                    </div>	
               </div>
        </div>    
    </main>
@include('layouts.footer-users')
@endsection