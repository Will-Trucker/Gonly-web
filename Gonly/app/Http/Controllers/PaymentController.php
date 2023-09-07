<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use DB;
use App\Models\Pay;


class PaymentController extends Controller
{
    public function payment(){

        return view('products.payment');
   
      }

    
      public function agregar(Request $request){
        try{
            $request->validate([
              'cliente' =>  'required | regex:/^[\pL\s\-]+$/u', 
              'correo' => 'required | email',
              'direccion' =>  'required | regex:/^[\pL\s\-]+$/u',
              'tarjeta' => 'required',
              'caducidad' => 'required',
              'cvc' => 'required | int '
            ]);
            DB::beginTransaction();
            $pago = new Pay;
            $pago->cliente=$request->get('cliente');
            $pago->correo=$request->get('correo');
            $pago->direccion=$request->get('direccion');
            $pago->tarjeta=$request->get('tarjeta');
            $pago->caducidad=$request->get('caducidad');
            $pago->cvc=$request->get('cvc');
            $pago->total=Cart::subtotal();
            
           /* $data = $pago->cliente;*/
        
            $pago->save();
    
            DB::commit(); //enviar transaccion
    
           }   catch (Exception $e ) {
            DB::rollback(); //no ejecutar nada si falla
          }    
          return response()->json([
            'success' => true,
            'message' => 'Pago exitoso'
          ]);
        }
}
