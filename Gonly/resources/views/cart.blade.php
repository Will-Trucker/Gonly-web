@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<body>
    
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
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi aperiam asperiores beatae nostrum laborum at sequi quibusdam nihil, sunt neque ipsam optio tempora sapiente mollitia exercitationem temporibus corrupti veniam alias. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse placeat iusto nihil autem, unde iure eum ipsum dolorem, atque cupiditate earum corporis veritatis eligendi reiciendis. Sequi odit rem soluta ad?
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
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi aperiam asperiores beatae nostrum laborum at sequi quibusdam nihil, sunt neque ipsam optio tempora sapiente mollitia exercitationem temporibus corrupti veniam alias.
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

</body>
</html>