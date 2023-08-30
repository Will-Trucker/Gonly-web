<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductoController extends Controller
{
    public function index(Category $categoria, SubCategory $subcategoria)
    {
        $products = $subcategoria->products;
        return view('producto.showProducts', compact('products'));
    }
}
