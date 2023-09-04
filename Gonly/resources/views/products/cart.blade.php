@extends('layouts.head-pretm')

@section('link-css-js')
    @vite(['resources/css/home/categories.css', 'resources/css/layouts-css/nav-guest.css', 'resources/css/layouts-css/footer-users.css' , 'resources/js/welcome.js', 'resources/css/carrito.css'])
@endsection

@section('Welcome')
    Carrito | Gonly
@endsection

@section('content-everyone')
    @include('layouts.nav-users-guest')
    <main>
        <div class="contenedor-carrito">
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
                        <td class="descripcion-td product-td description">
                            Descripción
                        </td>
                        <td class="precio-td product-td">
                            Precio
                        </td>
                        <td class="cantidad-td product-td">
                            Cantidad
                        </td>
                        <td class="elimianr-td product-td">
                            Eliminar
                        </td>
                    </tr>
                </thead>

                <!-- Segunda fila de información (la que se duplicará al agregar más productos) -->
                <tbody>
                    
                    <tr>
                        <td class="product-img-td">
                            <img src="dron.jpg" alt="Producto" width="250px">
                        </td>
                        <td>
                            Dron
                        </td>
                        <td class="texto-largo description">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                            </p>
                        </td>
                        <td>
                            $25.00
                        </td>
                        <td class="cantidad-td">
                            <input type="number" value="1" max="10" min="1">
                        </td>
                        <td>
                            <button class="fa-button-cont">
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="product-img-td">
                            <img src="dron.jpg" alt="Producto" width="250px">
                        </td>
                        <td>
                            Dron
                        </td>
                        <td class="texto-largo description">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                            </p>
                        </td>
                        <td>
                            $25.00
                        </td>
                        <td class="cantidad-td">
                            <input type="number" value="1" max="10" min="1">
                        </td>
                        <td>
                            <button class="fa-button-cont">
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="product-img-td">
                            <img src="{{Vite::asset('resources/img/dron.jpg')}}" alt="Producto" width="250px">
                        </td>
                        <td>
                            Super-Man&Spider-Man
                        </td>
                        <td class="texto-largo description">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            </p>
                        </td>
                        <td>
                            $25.00
                        </td>
                        <td class="cantidad-td">
                            <input type="number" value="1" max="10" min="1">
                        </td>
                        <td>
                            <button class="fa-button-cont">
                                <i class="fa-solid fa-trash fa-2x"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="product-img-td">
                            &nbsp
                        </td>
                        <td>
                            &nbsp
                        </td>
                        <td class="texto-largo description">
                            &nbsp
                        </td>
                        <td>
                            <div class="monto-extra-cont">
                                <div class="monto-1 montos">
                                    <b>Subtotal: &nbsp</b>
                                    <i>$200</i>
                                </div>
                                <hr>
                                <div class="monto-2 montos">
                                    <b class="mitad">Monto adicional:</b>
                                    <p class="mitad">+ $4.50</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            &nbsp
                        </td>
                        <td>
                            &nbsp
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="botones-contenedor">
            <input type="button" value="Seguir comprando" class="seguir-comprando-btn btn">
            <input type="button" value="Comprar" class="comprar-btn btn">
            <div class="subtotal">
                <b>Total: &nbsp </b>
                <i>$20.00</i>
            </div>
        </div>
   
   </main>
 @include('layouts.footer-users')

@endsection