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
                    <!-- <span>{{__('Names')}}</span> -->
                    <span class="icon"><i class="fas fa-user"></i></span>
                    <input type="text" placeholder="Pablo Perez" name="cliente" id="cliente" class="inputs_modificados custom-control-input form-control ">
                </div>
                <p class="error"></p>
                <div class="inputBox inputBoxmodified">
                    <!-- <span>E-mail</span> -->
                    <span class="icon"><i class="fas fa-envelope"></i></span>
                    <input type="email" placeholder="cliente234@mail.com" name="correo" id="correo" class="inputs_modificados custom-control-input" value="{{ $userEmail }}" readonly>
                </div>
                <p class="error"></p>
                <div class="inputBox inputBoxmodified">
                    <!-- <span>{{__('Address')}}</span> -->
                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                    <input  type="text" placeholder="Ciudad, Calle, Residencia, Casa" name="direccion" id="direccion" class="inputs_modificados custom-control-input form-control">
                </div>
                <p class="error"></p>
                <!-- <div class="flex"> -->
                    <div class="inputBox inputBoxmodified">
                        <!-- <span>Total</span> -->
                        <span class="icon"><i class="fas fa-dollar-sign"></i></span>
                        <input type="text" name="total" id="total" value="$ {{ Cart::total() }}" readonly class="inputs_modificados">
                    </div>
                <!-- </div> -->
                <p class="error"></p>
                <!-- <div class="flex"> -->
                  <div class="inputBox">
                    <!-- <span>{{__('Card')}}</span> -->
                  
                  <div class="card-js">
                    <input class="card-number my-custom-class form-control tarjeta" name="tarjeta" id=" tarjeta">

                    <input class="expiry-month" name="expiry-month">
                    <input class="expiry-year" name="expiry-year">
                    <input class="cvc" name="cvc"
                    id="cvc" class="form-control">
                  </div>
                  <!-- </div> -->
                 <p class="error"></p>
                </div>
                </div>
        </div>

    <button type="submit" class="btn-enviar-todo3" onclick="location.href='{{ route('thanks') }}'">{{__('Pay')}}</button>

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
    formData.push({ name: 'userEmail', value: '<?= $userEmail ?>'});

    $.ajax({
        url: '{{ route("shop.agregar") }}',
        type: 'post',
        data: element.serializeArray(),
        dataType: 'json',
        success: function(response) {
            $("button[type=submit]").prop('disabled', false);
            if (response['status'] === true) {
                $(".error").removeClass('invalid-feedback').html('');
                $("input[type='text'], select, input[type='number'],input[type='tel']").removeClass('is-invalid')

                window.location.href = "/";
            } else {
                var errors = response['errors'];
                $(".error").removeClass('invalid-feedback').html('');
                $("input[type='text'], select, input[type='number'],input[type='tel']").removeClass('is-invalid')

                $.each(errors, function(key, value) {
                    $("#" + key).addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(value)
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
