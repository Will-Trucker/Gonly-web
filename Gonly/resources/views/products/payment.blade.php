@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/card-products/payment.css', 'resources/css/layouts-css/nav-loged.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js'])
@endsection

@section('Welcome')
 Payment | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-loged')

    <main>

    <div class="contenedor">
<center>
    <form action="{{url('EnvioPago')}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="row">

            <div class="col">

                <h1 class="title">Pagar</h1>

                <div class="inputBox">
                    <img src="{{asset('img/card_img.png')}}" alt="">
                </div>
                <div class="inputBox">
                    <span>Nombre:</span>
                    <input type="text" placeholder="Pablo Perez" name="cliente" id="cliente" value="{{ old('cliente') }}">
                    @error('cliente')
                    <br>
                      <span role="alert" style="color: red;"> 
                        <strong>
                        {{ $message }} 
                        </strong>
                      </span>
                    @enderror
                </div>
                <div class="inputBox">
                    <span>Correo:</span>
                    <input type="email" placeholder="cliente234@mail.com" name="correo" id="correo" value="{{ old('correo')}}">
                    @error('correo')
                    <br>
                      <span role="alert" style="color: red;"> 
                        <strong>
                        {{ $message }} 
                        </strong>
                      </span>
                    @enderror
                </div>
                <div class="inputBox">
                    <span>Numero de Tarjeta:</span>
                    <input class="card-number form-control" autocomplete="off" type="tel" placeholder="1813-2582-3943-4540" name="tarjeta" id="tarjeta" @error('tarjeta') is-invalid @enderror controls value="{{old('tarjeta')}}">
                    @error('tarjeta')
                    <br>
                      <span role="alert" style="color: red;"> 
                        <strong>
                        {{ $message }} 
                        </strong>
                      </span>
                    @enderror
                </div>
                <div class="inputBox">
                    <span>Mes de caducidad:</span>
                    <input type="month" placeholder="Vencimiento" name="caducidad" id="caducidad" @error('caducidad') is-invalid @enderror controls value="{{old('caducidad')}}" min="2022-09" max="2026-12">
                    @error('caducidad')
                    <br>
                      <span role="alert" style="color: red;"> 
                        <strong>
                        {{ $message }} 
                        </strong>
                      </span>
                    @enderror
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Codigo de Seguridad:</span>
                        <input type="number" placeholder="124" name="cvc" min="0" max="999" id="cvc" @error('cvc') is-invalid @enderror controls value="{{old('cvc')}}">
                        @error('cvc')
                        <br>
                          <span role="alert" style="color: red;"> 
                            <strong>
                            {{ $message }} 
                            </strong>
                          </span>
                        @enderror
                    </div>
                              
                </div>
                <div class="flex">
                    <div class="inputBox">
                        <span>Total a Pagar</span>

                        <input type="number" readonly>
                    </div>
        
            </div>
    
        </div>

                      <button class="submit-btn" type="submit">
                    Pagar    
</button>
    </form>
</center>
</div>

    </main>

    @include('layouts.footer-users')
@endsection