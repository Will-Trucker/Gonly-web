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

        <section class="categorias-cont1">   
                @if($categories->isNotEmpty())
                @foreach ($categories as $category)
            <div class="categories-grid">
             
                <img src="{{ asset('uploads/category/'.$category->image) }}" alt="{{$category->name}}">
               <section>
                    <img src="{{ asset('uploads/category/'.$category->image) }}" alt="{{$category->name}}">
                    <img src="{{ asset('uploads/category/'.$category->image) }}" alt="{{$category->name}}">
                </section> 
                <div>
                    <h3>{{ $category->name }}</h3>      
                    <p>Con los que puedes adquirir solo aquí, en Gonly</p>
                    @if ($category->sub_category->isNotEmpty())
                   
                    @else 
                    <a href="{{ route("shop.index",$category->slug) }}" class="cta">
                        <span class="hover-underline-animation"> Ver Categoria </span>
                        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                            <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                        </svg>
                    </a>
                    @endif
              
                    @if ($category->sub_category->isNotEmpty())
                    @foreach ( $category->sub_category as $subCategory)
                    <a href="{{ route("shop.index",[$category->slug,$subCategory->slug]) }}" class="cta">
                        <span class="hover-underline-animation"> {{$subCategory->name}} </span>
                        <svg viewBox="0 0 46 16" height="10" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
                            <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
                        </svg>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
            @endforeach
            @endif
        </section>

         
            

    </main>
    @include('layouts.footer-users')
@endsection