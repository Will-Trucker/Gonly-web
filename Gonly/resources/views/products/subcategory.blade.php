@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css', 'resources/js/welcome.js', 'resources/css/card-products/style.css', 'resources/img/Card__Product-1.png'])
@endsection

@section('Welcome')
    {{ $subCategory->name }} | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <article>
            <div>
                <h2>{{ $subCategory->name }}</h2>
                <p>{{ __('Here you will find the products displayed by the selected subcategory.') }}</p>
            </div>
        </article>
        @if ($products->isNotEmpty())
            @foreach ($products as $product)
                @php
                    $productImage = $product->product_images->first();
                @endphp
                <div class="container">

                    <div class="container-color">
                        <div class="container-color1">
                            <div class="container-main">

                                <div class="container-img">
                                    <div class="container-all">
                                        <div class="item-slide">
                                            @if (!empty($productImage->image))
                                                <img src="{{ asset('uploads/product/small/' . $productImage->image) }}">
                                            @else
                                                <img src="{{ Vite::asset('resources/img/default-150x150.png') }}"
                                                    class="img-thumbnail default-product-image" width="150">
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="container-info-product">
                                    <div class="container-titulo">
                                        <span>{{ $product->title }}</span>

                                    </div>

                                    <div class="container-description">
                                        <div class="title-description">
                                            <h4>Descripción General</h4>
                                        </div>
                                        <div class="text-description">
                                            <p>
                                                {{ $product->description }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="container-price">
                                        <span>$ {{ $product->price }}</span>

                                    </div>


                                </div>
                                <div class="container-vermas">
                                    <button class="button-vermas">

                                        <span class="IconContainer">
                                            <a href="{{ route('shop.product', $product->slug) }}">
                                                <svg class="arrow" viewBox="0 0 448 512" height="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z">
                                                    </path>
                                                </svg>
                                        </span>

                                        <p class="text">Ver Más</p>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        @endif

        @if ($ProductsUser->isNotEmpty())
            @foreach ($ProductsUser as $productuse)
                <div class="container">
                    <div class="container-color">
                        <div class="container-color1">
                            <div class="container-main">
                                <div class="container-img">
                                    <div class="container-all">
                                        <div class="item-slide">
                                            <img src="{{ asset('storage/' . $productuse->photos) }}"
                                                alt="{{ $productuse->tittle }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="container-info-product">
                                    <div class="container-titulo">
                                        <span>{{ $productuse->tittle }}</span>
                                    </div>
                                    <div class="container-description">
                                        <div class="title-description">
                                            <h4>Descripción General</h4>
                                        </div>
                                        <div class="text-description">
                                            <p>{{ $productuse->description }}</p>
                                        </div>
                                    </div>
                                    <div class="container-price">
                                        <span>$ {{ $productuse->price }}</span>
                                    </div>
                                </div>
                                <div class="container-vermas">
                                    <button class="button-vermas">
                                        <span class="IconContainer">
                                            <a href="{{ route('shop.showProductUser', ['id' => $productuse->id]) }}">
                                                <svg class="arrow" viewBox="0 0 448 512" height="1em"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z">
                                                    </path>
                                                </svg>

                                        </span>
                                        </a>
                                        <p class="text">Ver Más</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="card-footer clearfix">
            {{ $products->links() }}
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"></script>
    </main>
    @include('layouts.footer-users')
@endsection
