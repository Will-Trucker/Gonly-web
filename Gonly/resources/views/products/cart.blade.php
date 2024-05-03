@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js', 'resources/css/carrito.css'])
@endsection

@section('Welcome')
   {{__('Shopping Cart')}} | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <div class="contenedor-carrito">
            @if(Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
            @endif
            @if(Cart::count() > 0)
            <h1>{{__('Shopping Cart')}}</h1>

            <table>

                <thead>
                    <tr class="titulos-producto">
                        <td class="product-img-td product-td">
                            {{__('Media')}}
                        </td>
                        <td class="nombre-td product-td">
                            {{__('Title')}}
                        </td>
                        <td class="precio-td product-td">
                            {{__('Price')}}
                        </td>
                        <td class="cantidad-td product-td">
                            Qty
                        </td>
                        <td class="cantidad-td product-td">
                            Total
                        </td>
                        <td class="elimianr-td product-td">
                           {{__('More options')}}
                        </td>
                    </tr>
                </thead>
                <!-- Segunda fila de información (la que se duplicará al agregar más productos) -->
                <tbody>

                    @foreach ($cartContent as $item)
                    <tr>
                        <td class="product-img-td">
                            @if(!empty($item->options->productImage->image))
                            <img src="{{ asset('uploads/product/small/'.$item->options->productImage->image) }}">
                            @else
                            <img src="{{ Vite::asset('resources/img/default-150x150.png') }}" class="img-thumbnail default-product-image" width="150">
                            @endif
                        </td>
                        <td>
                            {{  $item->name  }}
                        </td>
                        <td>
                            ${{ $item->price }}
                        </td>
                        <td>
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="boton_mas btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub" data-id="{{ $item->rowId }}">
                                      <i class="fa fa-minus"></i></button>
                                </div>
                                <input type="text" readonly class="readonly-input-quantity form-control form-control-sm  border-0 text-center numerito_q_incrementa" value="{{ $item->qty  }}">
                                <div class="input-group-btn">
                                    <button class="boton_mas btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add" data-id="{{ $item->rowId }}">
                                    <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            ${{ $item->price*$item->qty }}
                            </td>
                        <td>
                            <button class="fa-button-cont" onclick="deleteItem('{{ $item->rowId }}');">
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                        </td>
                    </tr>

                </tbody>
                @endforeach
                <tr>
                    <td colspan="6">
                        <div class="contenedor_td contenedor_td_full">
                            <div class="botones-contenedor">

                                <a href="{{route('shop.payment')}}" class="seguir-comprando-btn btn">{{__('Proceed to Pay')}}</a>


                                <a href="{{route('welcome')}}" class="comprar-btn btn">{{__('Continue buying')}}</a>
                            </div>
                            <div class="factura_contenedor">

                                <div class="factura_borde">
                                    <h3>
                                        {{__('Summary')}}
                                    </h3>
                                    <div class="todos_subtotales_cont">
                                        <div class="subtotal">
                                            <b>SubTotal: &nbsp </b>
                                            <i>
                                                $ {{ Cart::subtotal() }}
                                            </i>
                                        </div>
                                        <div class="subtotal">
                                            <b>Envio: &nbsp </b>
                                            <i>
                                                $ {{ Cart::tax() }}
                                            </i>
                                        </div>
                                        <div class="subtotal final_total_apagar">
                                            <b>Total a pagar: &nbsp </b>
                                            <i>
                                                $ {{ Cart::total() }}
                                            </i>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- contenedor del cuadro de "factura"  -->
                        </div>
                        <!-- ------------------------------------------------------ -->
                        <div class="contenedor_td contenedor_td_responsive">
                            <div class="botones-contenedor">

                                <a href="{{route('shop.payment')}}" class="seguir-comprando-btn btn">{{__('Proceed to Pay')}}</a>


                                <a href="{{route('welcome')}}" class="comprar-btn btn">{{__('Continue buying')}}</a>
                            </div>
                            <div class="factura_contenedor">

                                <div class="factura_borde">
                                    <h3>
                                        {{__('Summary')}}
                                    </h3>
                                    <div class="todos_subtotales_cont">
                                        <div class="subtotal">
                                            <b>SubTotal: &nbsp </b>
                                            <i>
                                                $ {{ Cart::subtotal() }}
                                            </i>
                                        </div>
                                        <div class="subtotal">
                                            <b>Envio: &nbsp </b>
                                            <i>
                                                $ {{Cart::tax()}}
                                            </i>
                                        </div>
                                        <div class="subtotal final_total_apagar">
                                            <b>Total a pagar: &nbsp </b>
                                            <i>
                                                $ {{ Cart::total() }}
                                            </i>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- contenedor del cuadro de "factura"  -->
                        </div>
                        <!-- ------------------------------------------------------ -->
                    </td>
                </tr>
                <!-- Aquí finaliza el table row -->

            </table>
                        <div class="factura_contenedor">


                            </div>
                            @else
                            <div class="col-md-12">
                                <section class="not-registers">
                                    <img src="{{ Vite::asset('resources/img/Decoration/cart-empty.png') }}" alt="">
                                    <h1>{{__('Your cart is empty!!')}}</h1>
                                </section>
                            </div>
@endif

   </main>
 @include('layouts.footer-users')
@endsection

@section('customJs')
  <script>
     $('.add').click(function(){
        var qtyElement = $(this).parent().prev(); // Qty Input
        var qtyValue = parseInt(qtyElement.val());
        if (qtyValue < 10) {
            qtyElement.val(qtyValue+1);

            var rowId = $(this).data('id');
            var newQty = qtyElement.val();
            updateCart(rowId,newQty);
        }
      });

      $('.sub').click(function(){
        var qtyElement = $(this).parent().next();
        var qtyValue = parseInt(qtyElement.val());
        if (qtyValue > 1) {
            qtyElement.val(qtyValue-1);
            var rowId = $(this).data('id');
            var newQty = qtyElement.val()
            updateCart(rowId,newQty);
        }
      });

    function updateCart(rowId,qty){
        $.ajax({
            url: '{{ route("shop.updateCart") }}',
            type: 'post',
            data: {rowId:rowId, qty:qty},
            dataType: 'json',
            success: function(response){
                window.location.href = '{{ route("shop.cart") }}';
            }
        });
    }

    function deleteItem(rowId){

        if(confirm("{{__('Are you sure you want to delete?')}}")){
                $.ajax({
                url: '{{ route("shop.deleteItem.cart") }}',
                type: 'post',
                data: {rowId:rowId},
                dataType: 'json',
                success: function(response){
                    window.location.href = '{{ route("shop.cart") }}';
                }
            });
        }


    }

  </script>
@endsection
