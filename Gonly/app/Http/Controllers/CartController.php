<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
   public function carrito(){
      return view('products.cart');
   }

   /*
    public function cartlist(){
    $items = \Cart::getContent();
    dd($items);

   public function add(Request $request){
      $p = Product::find($request->id);
      Cart::add(array(
          "id" => $p->id,
          "name" => $p->nombre,
          "price" => $p->precio,
          "quantity" => 1, 
          "attributes" => array(
              "image" => $p->image_path,
              "slug" => $p->slug
          ) 
          ));
          return redirect()->back()->with("success_message","Producto $p->nombre agregado");
  }*/

  /*
  //Quitar un producto del carrito
  public function removeitem(Request $request){
    if (isset($request->id)) {
      Cart::remove($request->id);
    }
    return back()->with('success', "Producto Eliminado Satisfactoriamente");
  }

  public function addQty(Request $request){
    if (isset($request->id)) {
      Cart::update($request->id, array("quantity" => +1));
    }
    return back()->with('success', "Producto Actualizado Satisfactoriamente");
  }

  public function removeQty(Request $request){
    if (isset($request->id)) {
      Cart::update($request->id, array("quantity" => -1));
    }
    return back()->with('success_message', "Producto Actualizado Satisfactoriamente");
  }

  //Limpiar el  carrito
  public function clear(){
      Cart::clear();
      return back()->with('success', "Carrito de Compras Vacio");
  }

*/

}
