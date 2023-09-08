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
    <form method="post" enctype="multipart/form-data" id="paymentForm" name="paymentForm">

        <div class="row">
            <div class="col">
                <h1 class="title">{{__('Payment Data')}}</h1>
                <div class="inputBox">
                    <span>{{__('Names')}}</span>
                    <input type="text" placeholder="Pablo Perez" name="cliente" id="cliente" class="custom-control-input form-control ">
                </div>
                <p class="error"></p>
                <div class="inputBox">
                    <span>E-mail</span>
                    <input type="email" placeholder="cliente234@mail.com" name="correo" id="correo" class="custom-control-input">
                </div>
                <p class="error"></p>
                <div class="inputBox">
                    <span>{{__('Address')}}</span>
                    <input  type="text" placeholder="Ciudad, Calle, Residencia, Casa" name="direccion" id="direccion" class="custom-control-input form-control">
                </div>
                <p class="error"></p>
                <div class="flex">
                    <div class="inputBox">
                        <span>Total</span>
                        <input type="text" name="total" id="total" value="$ {{ Cart::subtotal() }}" readonly>
                    </div>
                </div>
                <p class="error"></p>
                <div class="flex">
                  <div class="inputBox">
                    <span>{{__('Card')}}</span>
                    <input class="card-number form-control" autocomplete="off" type="tel" placeholder="1813-2582-3943-4540" name="tarjeta" id="tarjeta">
                  </div>
                </div>
                <p class="error"></p>
                <div class="flex">
                  <div class="inputBox">
                    <span>{{__('Expiry month')}}</span>
                    <input type="date" placeholder="Vencimiento" name="caducidad" id="caducidad" min="2023-09-07" class="form-control">
                  </div>
                </div>
                <p class="error"></p>
                <div class="flex">
                  <div class="inputBox">
                      <span>CVC</span>
                      <input type="number" placeholder="124" name="cvc" min="123" max="999" id="cvc" class="form-control">
                  </div>
                </div>
                <p class="error"></p>
            </div>
        </div>

    <button type="submit" class="btn-enviar-todo3">{{__('Pay')}}</button>

</form>
</center>
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