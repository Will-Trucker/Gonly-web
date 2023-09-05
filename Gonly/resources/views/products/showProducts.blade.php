@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js','resources/img/Card__Product-1.png','resources/css/card-products/product-view.css','resources/js/index.js','resources/img/2.jpg','resources/img/1.png'])
@endsection

@section('Welcome')
 {{ $products->title }}| Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <div class="container-main1">
            <div class="container-main2">
                <div class="container-img">
                <div class="container-all">
                    @if($products->product_images)
                    <input class="input-bottom" type="radio" id="1" name="image-slide" hidden>
                    <input class="input-bottom" type="radio" id="2" name="image-slide" hidden>
                    <input class="input-bottom" type="radio" id="3" name="image-slide" hidden>
                            <div class="slide">
                        @foreach ($products->product_images as $key => $productImage)
                        <div class="item-slide">
                            <img src="{{asset('uploads/product/large/'.$productImage->image)}}">
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination">
                        @foreach ($products->product_images as $key => $productImage)
                        <label class="pagination-item" for="{{ $key + 1 }}">
                            <img src="{{asset('uploads/product/large/'.$productImage->image)}}">
                        </label>
                        @endforeach
                    </div>  
                    @endif
                </div>
                </div>
                    <div class="container-info-product">
                        <div class="container-titulo">
                            <span>{{ $products->title }}</span> 
                        </div>
                        <div class="container-description">
                            <div class="title-description">
                                <h4>Descripción General</h4>
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                            <div class="text-description">
                                <p>
                                    {{ $products->description }}
                                </p>
                            </div>
                        </div>
                        <div class="container-price">
                            <span>${{ $products->price }}</span>  
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
               </div>
        </div>    
    </main>
@include('layouts.footer-users')
@endsection