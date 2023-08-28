@extends('layouts.head-pretm')

@section('link-css-js')

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    @vite(['resources/css/user/options-product.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js', 'resources/css/layouts-css/footer-users.css', 'resources/js/options-product.js'])
    
@endsection

@section('Welcome')
    Edicióm producto | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-loged')

    <main>
        <section>
            <article>
                <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                      <span class="text-xl">Aviso</span><span class="text-lg mx-4">esta es la previsualización del producto en cuestión para todos los usuarios.</span>
                    </div>
                </div>
            </article>
            <div class="container-prevializing">
                <div class="container-img">
                    <div class="container-all">
                        <input type="radio" id="1" name="image-slide" style="display: none">
                        <input type="radio" id="2" name="image-slide" style="display: none">
                        <input type="radio" id="3" name="image-slide" style="display: none">
                        <div class="slide">
                            <div class="item-slide">
                                <img src="{{ asset('storage').'/'.$product->photos }}" alt="">
                            </div>
                            <div class="item-slide">
                                <img src="https://i.ebayimg.com/thumbs/images/g/gpcAAOSwvqdkHG6t/s-l640.jpg">
                            </div>
                            <div class="item-slide">
                                <img src="https://i.ebayimg.com/thumbs/images/g/gpcAAOSwvqdkHG6t/s-l640.jpg">
                            </div>
                        </div>
                        <div class="pagination">
                            <label class="pagination-item" for="1">
                                <img src="{{ asset('storage').'/'.$product->photos }}" alt="">
                            </label>
                            
                            <label class="pagination-item" for="2">
                                <img src="https://i.ebayimg.com/thumbs/images/g/gpcAAOSwvqdkHG6t/s-l640.jpg">
                            </label>
                            
                            <label class="pagination-item" for="3">
                                <img src="https://i.ebayimg.com/thumbs/images/g/gpcAAOSwvqdkHG6t/s-l640.jpg">
                            </label>
                        </div>
                    </div>
                </div>   
                        <div class="container-info-product">
                            <div class="container-titulo">
                                <span>{{ $product->tittle }}</span>
                            </div>
                            <div class="container-description">
                                <div class="title-description">
                                    <h4>Descripcción</h4>
                                    <i class="fa-solid fa-chevron-down"></i>
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
                            <div class="container-add-cart">
                                <div>
                                </div>
                                <div class="container-quantity">
                                    <input
                                        type="number"
                                        placeholder="1"
                                        value="1"
                                        min="1"
                                        class="input-quantity"
                                    />
                                    <div class="btn-increment-decrement">
                                        <i class="fa-solid fa-chevron-up" style="display: none"  id="increment"></i>
                                        <i class="fa-solid fa-chevron-down" style="display: none" id="decrement"></i>
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
                                    <p>
                                        {{ $product->specifications }}
                                    </p>
                                </div>
                            </div>
                        </div>	
            </div>
            <aside>
                <div class="inline-flex rounded-md shadow-sm" role="group" style="display: flex; justify-content: center; margin-top: 35px;" >
                    <a href="{{ route('moreimg.create', ['id' => $product->id]) }}" type="button" class="inline-flex items-center px-4 py-2 text-xl font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                      <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <i style="margin-right: 10px" class="fa-solid fa-images"></i>
                     </svg>
                      Añadir más imágenes
                    </a>
                    <a href="{{ url('/products/'.$product->id.'/edit') }}" type="button" class="inline-flex items-center px-4 py-2 text-xl font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                      <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <i style="margin-right: 10px" class="fa-solid fa-pen-to-square"></i>
                      </svg>
                      Editar producto
                    </a>
                    <form action="{{ url('/products/'.$product->id) }}" method="post" class="inline-flex items-center px-4 py-2 text-xl font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        @csrf
                        {{method_field('DELETE')}}
                        <i style="margin-right: 10px" class="fa-solid fa-trash"></i>
                        <input type="submit" class="cursor-pointer h-full" value="Borrar producto">
                    </form>
                  </div>
            </aside>
        </section>

        {{--@include('layouts.form-user-products', ['nameLook' => 'Edición de producto'])--}}

    </main>
    <script src="index.js"></script> 
    @include('layouts.footer-users')    
@endsection