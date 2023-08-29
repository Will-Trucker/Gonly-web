<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>| Gonly - AdminPanel</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<link rel="shortcut icon" href="{{Vite::asset('resources/img/logo-gonly-icon.png')}}" type="image/x-icon"> 
		<meta name="csrf-token" content="{{csrf_token()}}">
		<link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/css/adminlte.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/plugins/dropzone/min/dropzone.min.css')}}">
		<link rel="stylesheet" href="{{asset('admin-assets/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('admin-assets/plugins/summernote/summernote.min.css')}}">
	</head>
	<body class="hold-transition sidebar-mini">
		
		<div class="wrapper">
			
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>

				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
				<div class="dropdown" style="display: flex; justify-content: center; left: 2rem;">
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

				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="{{Vite::asset('resources/img/avatar5.png')}}" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong>{{ Auth::guard('admin')->user()->name }}</strong></h4>
							<div class="mb-3">{{ Auth::guard('admin')->user()->email }}</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> {{__('Settings')}}
							</a>
							<div class="dropdown-divider"></div>
							<div class="dropdown-divider"></div>
							<a href="{{ route('admin.logout') }}" class="dropdown-item text-danger">
								<i class="fas fa-sign-out-alt mr-2"></i> {{__('Logout')}}
							</a>
						</div>
					</li>
				</ul>
			</nav>
            @include('admin.layouts.sidebar')
			<div class="content-wrapper">
				@yield('content')
			</div>
			<footer class="main-footer">
				<strong>Copyright &copy; 2023 Gonly {{__('All rights reserved')}}.
			</footer>
		</div>

		<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('admin-assets/plugins/dropzone/min/dropzone.min.js')}}"></script>
		<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"> </script>
		<script src="{{asset('admin-assets/js/adminlte.min.js')}}"></script>
		<script src="{{asset('admin-assets/js/demo.js')}}"></script>
		<script src="{{asset('admin-assets/plugins/summernote/summernote.min.js')}}"></script>
        <script>
			$.ajaxSetup({
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			$(document).ready(function(){
               $(".summernote").summernote({
				height:250

			   });
			});
		</script>
	
		@yield('customJs')
	</body>
</html>
