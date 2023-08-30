@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js'])
@endsection

@section('Welcome')
    Categorías | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <article>
            <div>
                <h2>Categorías</h2>
                <p>Aquí se encuentran las categorías proporcioadas por Gonly, en las que puedes comprar todo lo que necesites</p>
            </div>
        </article>
        @foreach($category as $categoria)
        <div class="categories-grid">
            <img src="/uploads/category/{{ $categoria->image }}">

            <div>
                <h3>{{ $categoria->name }}</h3>
                <a href="{{ route('subcategory.index')}}" class="cta">
                    <span class="hover-underline-animation"> Ver más </span>
                    <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                        <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </main>
    @include('layouts.footer-users')
@endsection