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
use App\Models\User;
use App\Models\OrderItem;

class PaymentController extends Controller
{

    public function payment()
    {
        $user = Auth::user();
        $userEmail = $user->email;
        $userName = $user->name;
        return view('products.payment', ['userEmail' => $userEmail,'userName'=> $userName]);
    }

    public function agregar(Request $request)
    {
        $user = Auth::user();
        $userName = $user->name;
        $userEmail = $user->email;
        $rules = [
            'correo' => 'required | email',
            'direccion' => 'required | max:255| regex:/^[\pL\s\-]+$/u',
            'expiry-month' => 'required',
            'expiry-year' => 'required',
            'cvc' => 'required | integer',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
        DB::beginTransaction();
        try {

            $pago = new Pay;
            $pago->cliente = $userName;
            $pago->correo = $userEmail;
            $pago->direccion = $request->direccion;
            $pago->tarjeta = $request->tarjeta;

            $expiryMonth = $request->input('expiry-month');
            $expiryYear = $request->input('expiry-year');
            $caducidad = $expiryMonth . '/' . $expiryYear;
            $pago->caducidad = $caducidad;

            $pago->cvc = $request->cvc;
            $pago->total = Cart::total();
            $pago->user_id = $user->id;

            $pago->save();

            // Guardar en tabla order_items para mostrar detalladamente la compra
            foreach (Cart::content() as $item) {
                 $pagoItem = new OrderItem;
                 $pagoItem->product_id = $item->id;
                 $pagoItem->order_id = $pago->id;
                 $pagoItem->name = $item->name;
                 $pagoItem->qty = $item->qty;
                 $pagoItem->price = $item->price;
                 $pagoItem->total = $item->total*$item->qty;
                 $pagoItem->save();
            }

            Mail::to($userEmail)->send(new PaymentConfirmation($pago->direccion, $pago->total));

            Cart::destroy();

            DB::commit();

            session()->flash('success','Orden Almacenada con éxito');

            return response()->json([
                'message' => 'Your transaction was successful, thank you for shopping with us | Su transacción fue exitosa, gracias por comprar con nosotros',
                'status' => true
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => 'An error occurred while processing your transaction. Please try again later.'
            ]);
        }
            // $pago = new Pay;
            // $pago->cliente = $request->cliente;
            // $pago->correo = $userEmail;
            // $pago->direccion = $request->direccion;
            // $pago->tarjeta = $request->tarjeta;

            // // Combina los valores de mes y año en un solo campo "caducidad"
            // $expiryMonth = $request->input('expiry-month');
            // $expiryYear = $request->input('expiry-year');
            // $caducidad = $expiryMonth . '/' . $expiryYear;
            // $pago->caducidad = $caducidad;

            // $pago->cvc = $request->cvc;
            // $pago->total = Cart::total();
            // $pago->user_id = $user->id;
            // Mail::to($userEmail)->send(new PaymentConfirmation($pago->direccion, $pago->total));
            // Cart::destroy();

            // $pago->save();



            // $request->session()->flash('success', trans('messages.pay_success'));

            // return response()->json([
            //     'status' => true,
            //     'message' => 'Your transaction was successful, thank you for shopping with us | Su transacción fue exitosa, gracias por comprar con nosotros'
            // ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
