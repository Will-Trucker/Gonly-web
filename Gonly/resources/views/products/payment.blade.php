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

    <form method="post" enctype="multipart/form-data" id="paymentForm" name="paymentForm">
    <div class="row">
        <div class="col">
            <h1 class="title">{{__('Payment Data')}}</h1>
            <div class="inputBox inputBoxmodified">
                <span class="icon"><i class="fas fa-user"></i></span>
                <input type="text" placeholder="{{__('Names')}}" name="cliente" id="cliente" class="inputs_modificados custom-control-input form-control" value="{{$userName}}">
            </div>
            <p class="error"></p>
            <div class="inputBox inputBoxmodified">
                <span class="icon"><i class="fas fa-envelope"></i></span>
                <input type="email" placeholder="E-mail" name="correo" id="correo" class="inputs_modificados custom-control-input" value="{{ $userEmail }}" readonly>
            </div>
            <p class="error"></p>
            <div class="inputBox inputBoxmodified">
                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                <input  type="text" placeholder="{{__('Address')}}" name="direccion" id="direccion" class="inputs_modificados custom-control-input form-control">
            </div>
            <p class="error direccion-error"></p>
            <!-- <div class="flex"> -->
                <div class="inputBox inputBoxmodified">
                    <span class="icon"><i class="fas fa-dollar-sign"></i></span>
                    <input type="text" name="total" id="total" value="$ {{ Cart::total() }}" readonly class="inputs_modificados">
                </div>
            <!-- </div> -->
            <p class="error"></p>
            <!-- <div class="flex"> -->
                <div class="inputBox">

                    <div class="card-js">
                        <input class="card-number my-custom-class form-control" name="tarjeta" id="tarjeta">
                        <p class="error tarjeta-error"></p>
                        <input class="expiry-month  my-custom-class form-control" name="expiry-month" id="expiry-month">
                        <input class="expiry-year  my-custom-class form-control" name="expiry-year" id="expiry-year">
                        <input class="cvc  my-custom-class form-control" name="cvc" id="cvc">
                        <p class="error cvc-error"></p>
                    </div>
                </div>
            <!-- </div> -->
            <p class="error"></p>
        </div>
    </div>

    <button type="submit" class="btn-enviar-todo3">{{__('Pay')}}</button>

</form>


</div>

    </main>

    @include('layouts.footer-users')
@endsection

@section('customJs')
<script type="text/javascript">
    $("#paymentForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        var formData = element.serializeArray();

        $.ajax({
            url: '{{ route("shop.agregar") }}',
            type: 'post',
            data: formData,
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                $(".error").removeClass('invalid-feedback').html('');

                if (response['status'] === true) {
                    window.location.href = response['redirect_url'];
                } else {
                    var errors = response['errors'];
                    $.each(errors, function(key, value) {
                        $("." + key + "-error").addClass('invalid-feedback').html(value);
                        $("#" + key).addClass('is-invalid');
                    });
                }
            },
            error: function(xhr, status, error) {
                alert("Something wrong has happened | Algo ocurrió de manera incorrecta");
            }
        });
    });

   </script>
@endsection
