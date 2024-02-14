<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use DB;
use App\Models\Pay;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
      public function payment(){
        return view('products.payment');
      }


      public function agregar(Request $request){
        $rules = [
            'cliente' =>  'required | regex:/^[\pL\s\-]+$/u',
            'correo' => 'required | email',
            'direccion' =>  'required | regex:/^[\pL\s\-]+$/u',
            'tarjeta' => 'required | max:16',
            'caducidad' => 'required',
            'cvc' => 'required | int '
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->passes()){
            $pago = new Pay;
            $pago->cliente=$request->cliente;
            $pago->correo=$request->correo;
            $pago->direccion=$request->direccion;
            $pago->tarjeta=$request->tarjeta;
            $pago->caducidad=$request->caducidad;
            $pago->cvc=$request->cvc;
            $pago->total=Cart::subtotal();

            Cart::destroy();

            $pago->save();


            $request->session()->flash('success',trans('messages.pay_success'));

            return response()->json([
                'status'=> true,
                'message' => 'Your transaction was successfully, thank you for shopping with us | Su transacción fue exitosa, gracias por comprar con nosotros'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
             ]);
        }
    }
}
