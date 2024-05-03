@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css', 'resources/js/welcome.js', 'resources/css/card-products/product-view.css', 'resources/js/index.js'])
@endsection

@section('Welcome')
    {{ $productUser->tittle }} | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')

    <main>
        <div class="container-main1">
            <div class="container-main2">
                <div class="container-img">
                    <div class="container-all">
                        <div class="slide">
                            <div class="item-slide">
                                <img src="{{ asset('storage/' . $productUser->photos) }}" alt="{{ $productUser->tittle }}">
                            </div>
                        </div>
                        <div class="pagination">
                            <label class="pagination-item">
                                <img src="{{ asset('storage/' . $productUser->photos) }}" alt="{{ $productUser->tittle }}">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="container-info-product">
                    <div class="container-titulo">
                        <span>{{ $productUser->tittle }}</span>
                    </div>
                    <div class="container-description">
                        <div class="title-description">
                            <h4>{{ __('Description') }}</h4>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="text-description">
                            <p>
                                {{ $productUser->description }}
                            </p>
                        </div>
                    </div>
                    <div class="container-price">
                        <span>${{ $productUser->price }}</span>
                    </div>
                    <div class="container-add-cart">
                        <a href="javascript:void(0);" onclick="addToCart({{ $productUser->id }});" class="btn btn-dark"><i
                                class="fas fa-shopping-cart"></i> {{ __('Add to cart') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('layouts.footer-users')
@endsection
