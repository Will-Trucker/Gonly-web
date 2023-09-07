@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js','resources/css/card-products/payment.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/css/card-products/card-js.min.css' , 'resources/js/welcome.js' , 'resources/js/card-js.min.js'])
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
        <div class="row">
            <div class="col">
                <h1 class="title">{{__('Payment Data')}}</h1>
                <div class="inputBox">
                    <span>{{__('Names')}}</span>
                    <input type="text" placeholder="Pablo Perez" name="cliente" id="cliente">
                </div>
                <div class="inputBox">
                    <span>E-mail</span>
                    <input type="email" placeholder="cliente234@mail.com" name="correo" id="correo">
                </div>
                <div class="inputBox">
                  <span>{{__('Country')}}</span>
                  <div class="mb-3">
                     <select name="country" id="country" class="form-control">
                        <option value="">{{__('Select a country')}}</option>
                        @if ($countries->isNotEmpty())
                            @foreach ($countries as $country)
                                <option value="{{ $country->id  }}">{{ $country->name }}</option>
                            @endforeach
                        @endif
                     </select>
                  </div>
              </div>
                <div class="inputBox">
                    <span>{{__('Address')}}</span>
                    <input  type="text" placeholder="Ciudad, Calle, Residencia, Casa" name="direccion" id="direccion">
                </div>
                <div class="inputBox">
                    <span>Fecha de nacimiento</span>
                    <input type="date" placeholder="Nacimiento" name="caducidad" id="caducidad" min="1945-01-01" max="2005-03-31">
                    <br>
                </div>
              
                <div class="flex">
                    <div class="inputBox">
                        <span>Total a Pagar</span>
                        <input type="text" name="subtotal" value="$ {{ Cart::subtotal() }}" readonly>
                    </div>
                </div>
              
                <!-- información de la tarjeta -->
                <legend class="detalles_de_tu_tarjeta_txt">Detalles de pago</legend>

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