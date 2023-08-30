<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
   public function cartlist(){
    $items = \Cart::getContent();
    dd($items);
   }


}
