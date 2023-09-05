<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
   public function addToCart(Request $request){
      $products = Product::with('product_images')->find($request->id);

      if($products == null){
        return response()->json([
          'status' => false,
          'message' => 'Product not found | Producto no encontrado'
        ]);
      }

     if(Cart::count() > 0){
       //echo "Product already in cart";

       //Productos encontrados en el carrito

       // Verificar si los productos realmente se encuentra en el carrito

       // Mostrar un mensaje que el producto fue agregado en el carrito

       // Si el producto no fue agregado al carrito, luego agrega el producto en el carrito


     } else {
        echo "Cart is empty now adding a product in cart";
        // Carrito esta vacio
        Cart::add($products->id,$products->title, 1, $products->price, ['productImage' => (!empty($products->product_images)) ? $products->product_images->first() : '']);
        $status = true;
        $message = $products->title.' added in cart';
     }

     return response()->json([
      'status' => $status,
      'message' => $message
    ]);
      //Cart::add('293ad', 'Product 1', 1, 9.99);
  }

   public function cart(){
    dd(Cart::content());
    // return view('products.cart');
   }


}
