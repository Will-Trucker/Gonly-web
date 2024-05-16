<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Products_user;

class ShopController extends Controller
{
    public function index(Request $request, $categorySlug = null, $subCategorySlug = null)
    {

        $categories = Category::orderBy('name', 'ASC')->with('subcategories')->where('status', 1)->get();

        $ProductsUser = Products_user::all();

        $products = Product::where('status', 1);

        $category = null;

        if ($category) {

            $ProductsUser->where('category_id', $category->id);
            $products->where('category_id', $category->id);
            $products = $products->get();

            if (!$subCategorySlug) {
                return view('categories', ['category' => $category, 'products' => $products, 'ProductsUser' => $ProductsUser]);
            }
        }

        if ($subCategorySlug) {

            $subCategory = SubCategory::where('slug', $subCategorySlug)->first();

            if ($subCategory) {

                $ProductsUser = Products_user::where('sub_category_id', $subCategory->id)->get();

                $products->where('sub_category_id', $subCategory->id);

                return view('products.subcategory', ['subCategory' => $subCategory, 'products' => $products->paginate(6), 'ProductsUser' => $ProductsUser]);
            }
        }

        $ProductsUser = $ProductsUser;
        $products = $products->paginate(6);

        $data['categories'] = $categories;
        $data['products'] = $products;
        $data['ProductsUser'] = $ProductsUser;


        return view('categories', $data);
    }

    public function product($slug)
    {
        // echo $slug;

        //$ProductsUser

        $products = Product::where('slug', $slug)->with('product_images')->first();

        if ($products == null) {
            abort(404);
        }

        $data['products'] = $products;
        return view('products.showProducts', $data);
    }


    public function showProductUser($id)
    {
        $productUser = Products_user::where('id', $id)->first();

        if ($productUser == null) {
            abort(404);
        }

        $deta['productUser'] = $productUser;
        return view('products.showProductUser', $deta);

    }




    /*
    public function show(Request $request, $categorySlug = null, $subCategorySlug = null){

        $categories = Category::orderBy('name','ASC')->where('status',1)->get();

        $products = Product::where('status',1);

        if ($categorySlug) {
            // Obtener la categoría según el slug proporcionado
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                // Filtrar productos por la categoría seleccionada
                $products->where('category_id', $category->id);

                // Obtener los productos finales después de aplicar filtros
                $products = $products->get();

                // Si solo se proporciona un slug de categoría, redirigir a una vista diferente
                if (!$subCategorySlug) {
                    return view('products.categories', ['category' => $category, 'products' => $products]);
                }

                // Si se proporciona un slug de subcategoría, continuar como lo hacías antes
                // ...
            }
        }

        $products = $products->get();

        $data['categories'] = $categories;
        $data['products'] = $products;

        return view('products.categories', $data);

    }
    */
}
