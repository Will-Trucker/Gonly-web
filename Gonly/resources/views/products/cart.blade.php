@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js', 'resources/css/carrito.css'])
@endsection

@section('Welcome')
    Carrito de Compras | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <div class="contenedor-carrito">
            @if(Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                  </div>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                  </div>
            </div>
            @endif
            <h1>Carrito de compras</h1>
            <table>
                <thead>
                    <tr class="titulos-producto">
                        <td class="product-img-td product-td">
                            Imagen
                        </td>
                        <td class="nombre-td product-td">
                            Nombre
                        </td>
                        <td class="precio-td product-td">
                            Precio
                        </td>
                        <td class="cantidad-td product-td">
                            Cantidad
                        </td>
                        <td class="cantidad-td product-td">
                            Total
                        </td>
                        <td class="elimianr-td product-td">
                           Opciones
                        </td>
                    </tr>
                </thead>
                @if(!empty($cartContent))
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
                                    <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub" data-id="{{ $item->rowId }}">
                                      <i class="fa fa-minus"></i></button>
                                </div>
                                <input type="number" readonly class="form-control form-control-sm  border-0 text-center numerito_q_incrementa" value="{{ $item->qty  }}">
                                <div class="input-group-btn">
                                <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add" data-id="{{ $item->rowId }}">
                                <i class="fa fa-plus"></i>
                                </button>
                                    </div>
                                </div>
                            </td>  
                            <td>
                            ${{ $item->price*$item->qty }}
                            </td>
                        <td>
                            <button class="fa-button-cont">
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                        </td>
                       
                    </tr>
                    
                </tbody> 
                @endforeach
        @endif
<tr>
    <td>
       <div class="input-group quantity mx-auto" style="width: 100px;">
            <div class="input-group-btn">
                <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1 sub">
                <i class="fa fa-minus"></i></button>
                </div>
                <input type="number" readonly class="form-control form-control-sm  border-0 text-center" value="3">
                <div class="input-group-btn">
                <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1 add"">
                <i class="fa fa-plus"></i>
                </button>
                    </div>
                         </div>
                        </td>  
                        <td>
                            <button class="fa-button-cont">
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                        </td>
                    </tr>
                <tr>
                    <td colspan="6">
                        <div class="contenedor_td contenedor_td_full">
                            <div class="botones-contenedor">
                                <input type="button" value="Seguir comprando" class="seguir-comprando-btn btn">
                                <input type="button" value="Comprar" class="comprar-btn btn">
                            </div>
                            <div class="factura_contenedor">
                                
                                <div class="factura_borde">
                                    <h3>
                                        Summary
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
                                                $0 
                                            </i>
                                        </div> 
                                        <div class="subtotal final_total_apagar">
                                            <b>Total a pagar: &nbsp </b>
                                            <i>  
                                                $ {{ Cart::subtotal() }}
                                            </i>
                                        </div> 
                                    </div>
                                </div>

                            </div> <!-- contenedor del cuadro de "factura"  -->
                        </div>
                    </td>
                </tr>
                <!-- Aquí finaliza el table row -->

            </table>

                    <div class="contenedor_td contenedor_td_responsive">
                        <div class="botones-contenedor">
                            <input type="button" value="Seguir comprando" class="seguir-comprando-btn btn">
                            <input type="button" value="Comprar" class="comprar-btn btn">
                        </div>
                        <div class="factura_contenedor">
                            
                            <div class="factura_borde">
                                <h3>
                                    Summary
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
                                            $0 
                                        </i>
                                    </div> 
                                    <div class="subtotal final_total_apagar">
                                        <b>Total a pagar: &nbsp </b>
                                        <i>  
                                            $ {{ Cart::subtotal() }}
                                        </i>
                                    </div> 
                                </div>
                            </div>

                        </div>  <!--contenedor del cuadro de "factura" -->
                    </div>
        
        </div>  <!-- Aquí se cierra el div.contenedor-carrito -->

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

  </script>
@endsection