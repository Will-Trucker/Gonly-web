<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class ProductsUserSubCategoryController extends Controller
{
    //
    public function index(Request $request){

        if (!empty($request->category_id)){
          $subCategories = SubCategory::where('category_id',$request->category_id)
          ->orderBy('name','ASC')
          ->get();
    
          return response()->json([
              'status' => true,
              'subCategories' => $subCategories
          ]);
        } else {
            return response()->json([
                'status' => true,
                'subCategories' => []
            ]);
        }
    }
}