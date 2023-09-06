<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class CartController extends Controller
{
   public function addToCart(Request $request){
      $product = Product::with('product_images')->find($request->id);

      if($product == null){
        return response()->json([
          'status' => false,
          'message' => 'Product not found | Producto no encontrado'
        ]);
      }

     if(Cart::count() > 0){
       //Productos encontrados en el carrito
       // Verificar si los productos realmente se encuentra en el carrito
       // Mostrar un mensaje que el producto fue agregado en el carrito
       // Si el producto no fue agregado al carrito, luego agrega el producto en el carrito

       $cartContent = Cart::content();
       $productAlreadyExist = false;

       foreach ($cartContent as $item) {
           if($item->id == $product->id){
            $productAlreadyExist = true;
          }
       }

      if($productAlreadyExist == false){
        Cart::add($product->id,$product->title, 1, $product->price, ['productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '']);

        $status = false;
        $message = $product->title.' added in cart';

         } else {
          $status = true;
          $message = $product->title.' already added in cart';
        }
     } else {
        Cart::add($product->id,$product->title, 1, $product->price, ['productImage' => (!empty($product->product_images)) ? $product->product_images->first() : '']);
        $status = true;
        $message = $product->title.' added in cart';
     }

     return response()->json([
      'status' => $status,
      'message' => $message
    ]);

  }

   public function cart(){
      $cartContent  = Cart::content();
      //dd($cartContent);
      $data['cartContent'] = $cartContent;

      return view('products.cart',$data);
   }

   public function updateCart(Request $request){
   /*    $rowId = $request->rowId;
       $qty = $request->qty;

       $itemInfo = Cart::get($rowId);
       $product = Product::find($itemInfo->id);

       // Verificar qty si esta en stock

       if($product->track_qty == 'Yes'){ 
          if($qty <= $product->qty){
            Cart::update($rowId, $qty);
            $message = trans('messages.cart_update');
            $status = true;
          } else {
            $message = trans('messages.cart_not_qty');
            $status = false;
          }
       } else {
          Cart::update($rowId,$qty);
          $message = trans('messages.cart_update');
          $status = true;
       }

       session()->flash('success',$message);
       return response()->json([
          'status' => true,
          'message' => $message
       ]);*/
   }


}
