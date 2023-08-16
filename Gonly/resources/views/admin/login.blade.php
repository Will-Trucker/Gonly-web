<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin panel | Gonly</title>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        
		<link rel="shortcut icon" href="{{Vite::asset('resources/img/logo-gonly-icon.png')}}" type="image/x-icon">
		<link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">

		@vite(['resources/css/login.css',
		      'resources/img/logo-gonly-icon.png'	 
		])
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
            @include('admin.message')
			<!-- logo -->
			<div class="card card-outline card-primary contenedor">
			  	<div class="card-header text-center">
					<a href="#" class="h3">Gonly ADMIN</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">{{__('Enter your admin credentials')}}</p>
					<form action="{{route('admin.authenticate')}}" method="post" enctype="multipart/form-data">
                        @csrf
				  		<div class="input-group mb-3">
							<input type="email" name="email" value="{{old('email')}}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
                            @error('email')
                             <p class="invalid-feedback">{{$message}}</p>
                            @enderror
				  		</div>
				  		<div class="input-group mb-3">
							<input type="password" name="password" value="{{old('password')}}" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
                            @error('password')
                            <p class="invalid-feedback">{{$message}}</p>
                            @enderror
				  		</div>
				  		<div class="row" style="display: flex; justify-content: center;">
							<div class="col-5">
					  			<button type="submit" style="display: flex; justify-content: center;" class="mx-auto btn btn-primary btn-block ">{{__('Login')}}</button>
							</div>
				  		</div>
					</form>
                    <br>
					<div class="dropdown" style="display: flex; justify-content: center;">
						<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							{{__('Language')}}: {{ Config::get('languages')[App::getLocale()] }} <i class="ml-2 fa-solid fa-caret-down"></i></button>
						</button>
						<ul class="dropdown-menu">
							@foreach (Config::get('languages') as $lang => $language)
								@if ($lang != App::getLocale())
									<li><a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{$language}}</a></li>
								@endif
							@endforeach
						</ul>
					</div>
			
			  	</div>
			</div>
		</div>
		<!--
		<div class="relatve z-10">
			<button id="menuButton" class="bg-transparent w-48 border-2 border-amber-300 py-2">Lenguaje:{{ Config::get('languages')[App::getLocale()] }}  <i class="ml-2 fa-solid fa-caret-down"></i></button>
			<div id="menuDropdown" class="absolute w-48 bg-white rounded-lg shadow-xl hidden ">
			  @foreach (Config::get('languages') as $lang => $language)
				@if ($lang != App::getLocale())
				  <a class="block text-center px-4 py-3 text-gray-800 hover:bg-gray-100 w-full" href="{{ route('lang.switch', $lang) }}"> {{$language}}</a>
				@endif
			  @endforeach
			</div>
		  </div>
		-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('admin-assets/js/demo.js')}}"></script>
		<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
	</body>
</html>
