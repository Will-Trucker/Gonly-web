@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js'])
@endsection

@section('Welcome')
    SubCategorias | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <article>
            <div>
                <h2>SubCategorías</h2>
                <p>Aquí se encuentran las categorías proporcioadas por Gonly, en las que puedes comprar todo lo que necesites</p>
            </div>
        </article>
       
        @foreach ($subcategory as $subcategoria)
        <div class="categories-grid">
            <div>
            <a href="{{route('producto.index')}}">
                {{ $subcategoria->name }}
            </a>
        </div>
        </div>
    @endforeach
    </main>
    @include('layouts.footer-users')
@endsection