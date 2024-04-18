<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use DB;
use App\Models\Pay;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function payment()
    {
        $user = Auth::user();
        $userEmail = $user->email;
        return view('products.payment', ['userEmail' => $userEmail]);
    }

    public function agregar(Request $request){
        $user = Auth::user();
        $userEmail = $user->email;
        $rules = [
            'cliente' => 'required | regex:/^[\pL\s\-]+$/u',
            'correo' => 'required | email',
            'direccion' => 'required | max:255| regex:/^[\pL\s\-]+$/u',
            'expiry-month' => 'required',
            'expiry-year' => 'required',
            'cvc' => 'required | integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $pago = new Pay;
            $pago->cliente = $request->cliente;
            $pago->correo = $userEmail;
            $pago->direccion = $request->direccion;
            $pago->tarjeta = $request->tarjeta;

            // Combina los valores de mes y año en un solo campo "caducidad"
            $expiryMonth = $request->input('expiry-month');
            $expiryYear = $request->input('expiry-year');
            $caducidad = $expiryMonth . '/' . $expiryYear;
            $pago->caducidad = $caducidad;

            $pago->cvc = $request->cvc;
            $pago->total = Cart::total();
    Mail::to($userEmail)->send(new PaymentConfirmation($pago->direccion, $pago->total));
            Cart::destroy();

            $pago->save();

            $request->session()->flash('success', trans('messages.pay_success'));

                return response()->json([
                    'status' => true,
                    'message' => 'Your transaction was successful, thank you for shopping with us | Su transacción fue exitosa, gracias por comprar con nosotros'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ]);
            }
    }
}
