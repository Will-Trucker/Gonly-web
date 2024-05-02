<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay;
use App\Models\Product;


class OrderController extends Controller
{
    public function index(Request $request){
      $orders = Pay::latest('orders.created_at')->select('orders.*','users.name','users.email');
      $orders = $orders->leftJoin('users','users.id','orders.user_id');

      if ($request->get('keyword') != ""){
       $orders = $orders->where('users.name','like','%'.$request->keyword.'%');
       $orders = $orders->orWhere('users.email','like','%'.$request->keyword.'%');
       $orders = $orders->orWhere('orders.user_id','like','%'.$request->keyword.'%');
       
      }

      $orders = $orders->paginate('10');
     // $data['orders'] = $orders;
      return view('admin.order.list',[
        'orders' => $orders
      ]);
    }

    public function detail($orderId){
      
      $order = Pay::where('id',$orderId)->first();

      return view('admin.order.detail');
    }
}
