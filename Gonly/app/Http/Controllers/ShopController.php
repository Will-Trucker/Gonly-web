<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class ShopController extends Controller
{
    public function index(Request $request, $categorySlug = null, $subCategorySlug = null){

        $categories = Category::orderBy('name','ASC')->with('sub_category')->where('status',1)->get();

        $products = Product::where('status',1);

       /* if(!empty($categorySlug)){

        } */

        if ($categorySlug) {
            // Obtener la categoría según el slug proporcionado
            $category = Category::where('slug', $categorySlug)->first();
            
            if ($category) {
                // Filtrar productos por la categoría seleccionada
                $products->where('category_id', $category->id);
            }
        }

         // Filtrar por subcategoría si se proporciona un slug de subcategoría
    if ($subCategorySlug) {
        // Obtener la subcategoría según el slug proporcionado
        $subCategory = SubCategory::where('slug', $subCategorySlug)->first();
        
        if ($subCategory) {
            // Filtrar productos por la subcategoría seleccionada
            $products->where('sub_category_id', $subCategory->id);
            
            // Redirigir a una vista diferente si se selecciona una subcategoría
            return view('products.subcategory', ['subCategory' => $subCategory, 'products' => $products->get()]);
        }
    }

    // Obtener los productos finales después de aplicar filtros
    $products = $products->get();

        $data['categories'] = $categories;
        $data['products'] = $products;


        return view('products.shop', $data);
    }
}
