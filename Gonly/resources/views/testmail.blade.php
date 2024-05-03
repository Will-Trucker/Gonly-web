@component('mail::message')
<center><h3 class="titulo" style="text-align: center;">Gracias por comprar con nososotros<h3></center>
<br><br>
<p>Estimado cliente su compra fue realizada de manera exitosa, su pedido le llegara a la siguiente
  dirección:
</p>

@component('mail::panel')
<h3>{{$direccion}}</h3>
@endcomponent
@component('mail::panel')
<h3>Total a Pagar: $ {{$total}}</h3>
@endcomponent
{{config('APP_NAME') }}
@endcomponent