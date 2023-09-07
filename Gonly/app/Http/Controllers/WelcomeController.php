<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products_user;
use App\Models\Category;

class WelcomeController extends Controller
{
    //
    public function index()
    {

        $productos = Products_user::all();

        $categorías = Category::all();

        return view('welcome', compact('productos', 'categorías'));
    
    }
}
