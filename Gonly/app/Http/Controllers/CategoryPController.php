<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryPController extends Controller
{
    public function index(){
        $category = Category::where('');
        return view('products.category',compact('category'));
    }

}
