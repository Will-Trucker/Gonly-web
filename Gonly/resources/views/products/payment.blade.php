@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/card-products/payment.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/css/card-products/card-js.min.css' , 'resources/js/welcome.js' , 'resources/js/card-js.min.js'])
@endsection

@section('Welcome')
 Payment | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')

    <main>

    <div class="contenedor">
<center>
    <form action="" method="post" enctype="multipart/form-data">
       @csrf
        <div class="row">
            <div class="col">
                <h1 class="title">Pagar</h1>
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
                    <span>Direccion</span>
                    <input  type="text" placeholder="Ciudad, Calle, Residencia, Casa" name="direccion" id="direccion" value="{{ old('direccion') }}">
                    @error('direccion')
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

                <!-- información de la tarjeta -->
                <legend class="detalles_de_tu_tarjeta_txt">Detalles de tu tarjeta</legend>

                <div class="card-js form-group">

                    <div class="inputBox">
                        <input class="card-number form-control"
                                name="my-custom-form-field__card-number"
                                placeholder="Ingresa tu número de tarjeta"
                                autocomplete="off"
                                required>
                    </div>


                    <input class="name form-control"
                            id="the-card-name-id"
                            name="my-custom-form-field__card-name"
                            placeholder="Ingresa el nombre en tu tarjeta"
                            autocomplete="off"
                            required>


                    <!-- Card expiry (element that is displayed) -->
                    <input class="expiry form-control"
                            autocomplete="off"
                            required>

                    <!-- Card expiry - Month (hidden) -->
                    <input class="expiry-month" name="my-custom-form-field__card-expiry-month">

                    <!-- Card expiry - Year (hidden) -->
                    <input class="expiry-year" name="my-custom-form-field__card-expiry-year">


                    <!-- Card CVC -->
                    <input class="cvc form-control"
                            name="my-custom-form-field__card-cvc"
                            autocomplete="off"
                            required>

                </div><!-- END .card-js wrapper -->

            </div>
        </div>

    <!--
      -- Submit button
      --
      -- (Must be outside of the div with class 'card-js')
      -->
    <button type="submit" class="btn-enviar-todo3">Pagar</button>

</form>
</center>
</div>

    </main>

    @include('layouts.footer-users')
@endsection