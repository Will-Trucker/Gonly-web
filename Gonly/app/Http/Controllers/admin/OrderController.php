<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay;

class OrderController extends Controller
{
    public function index(Request $request){
      $orders = Pay::latest('id');
      if ($request->get('keyword') != ""){
        $orders->where('title','like','%'.$request->keyword.'%');
      }

      $orders = $orders->paginate();
      $data['orders'] = $orders;
      return view('admin.order.list',$data);
    }
}
