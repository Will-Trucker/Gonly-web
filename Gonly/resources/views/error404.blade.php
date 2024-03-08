@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/error404.css'])
@endsection

@section('content-everyone')
<style>
	body{
		background-image: url(../img/error.jpg);
		background-size: cover; /* Ajusta la imagen para que cubra todo el fondo */
        background-repeat: no-repeat;
	}
	</style>
<div id="notfound">
		<div class="notfound">
			<div class="notfound-bg">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<h1>¡Oh no!</h1>
			<h2>Error 404 : Página no encontrada</h2>
			<a href="{{ route('welcome') }}">Regresar a Home</a>
		</div>
	</div>

@endsection