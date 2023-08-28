@extends('layouts.head-pretm')

@section('link-css-js')

    <script src="https://kit.fontawesome.com/81581fb069.js" crossorigin="anonymous"></script>    
    @vite([ 'resources/css/user/upload-more-images-product.css', 'resources/css/user/form-products.css', 'resources/css/layouts-css/nav-loged.css', 'resources/js/app.js', 'resources/css/layouts-css/footer-users.css', 'resources/js/options-product.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">    @endsection

@section('Welcome')
    Más imágenes | Gonly
@endsection

@php
    $product = \App\Models\Products::find(request()->id); // Obtén el producto según el ID en la URL
@endphp


@section('content-everyone')
    @include('layouts.nav-users-loged')

    {{--
        <form action="{{ route('moreimg.store', ['id' => $product->id]) }}" method="POST" class="form-images-upload" enctype="multipart/form-data">
        @csrf
        <div class="form-logo">
            <img src="{{ Vite::Asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
            <h1>Añadir más imágenes</h1>
        </div>
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Cuidado!</span> Una vez que ingrese las imágenes, no podrá cambiarlas ni borrarlas
            </div>
        </div>
        
        <input type="file" name="file" id="url" accept="image/*">
        @error('file')
            <br>
            <small style="color: #090; font-size: 16px;">{{$message}}</small>
        @enderror
        <br>
        <br>
        <input type="submit" class="submit" value="Añadir imágenes">
        </form>--
    --}}
    <div class="form-images-upload">
        <div class="form-logo">
            <img src="{{ Vite::Asset('resources/img/Logos/logo-gonly-icon.png') }}" alt="">
            <h1>Añadir más imágenes</h1>
        </div>
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">Cuidado!</span> Una vez que ingrese las imágenes, no podrá cambiarlas ni borrarlas
            </div>
        </div>
        <form action="{{ route('moreimg.store', ['id' => $product->id]) }}" method="POST" class="dropzone" id="my-great-dropzone" enctype="multipart/form-data">
            {{ csrf_field() }}
        </form>
    </div>
    @include('layouts.footer-users')    
@endsection

    
<script>
    Dropzone.options.imageUpload = {
    maxFiles: 5,
    addRemoveLinks: true,
    accept: function(file, done) {
        console.log("uploaded");
        done();
    },
    init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });
    },
   maxfilesexceeded: function (files) {
    this.removeAllFiles();
    this.addFile(files);
  },

};
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>