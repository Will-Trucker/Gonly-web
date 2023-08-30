<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryPController extends Controller
{
    public function index()
    {
      /*  $category = SubCategory::where('category_id', $category)->get();
        //$subcategories = $category->subcategory;

        return view('products.subcategory',compact('category'));*/

        $subcategory = SubCategory::all();
        return view('products.subcategory',compact('subcategory'));

    }


}
