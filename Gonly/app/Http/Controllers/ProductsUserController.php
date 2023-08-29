<?php

namespace App\Http\Controllers;

use App\Models\Products_user;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductsUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;

        $data['products'] = Products_user::where('user_id', $user_id)->paginate(6);

        return view('user.products-view', $data);
    }

    public function additionalView($id)
    {
        //
        $user_id = auth()->user()->id;

        $product = Products_user::where('user_id', $user_id)->where('id', $id)->firstOrFail();

        return view('user.options-product', compact('product'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.form-products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $camps = [
            'tittle'=>'required|string|max:25',
            'description'=>'required|string|max:530',
            'specifications'=>'required|string|max:1220',
            'price' => 'required|numeric|min:0|max:50000',
            'photos'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $message=[
            'tittle.max'=>'El título del producto no debe ser mayor a 25 caracteres (Incluyendo espacios)',
            'description.max'=>'La descripcción del producto no debe exceder más de 530 caracteres (Incluyendo espacios)',
            'specifications.max'=>'Las especificaciones del producto no debe exceder más de 1220 caracteres (Incluyendo espacios)',
            'tittle.required'=>'El título del producto es obligatorio',
            'description.required'=>'La descripcción del producto es obligatorio',
            'specifications.required'=>'Las especificaciones del producto son obligatorios',
            'price.required'=>'El precio del producto es obligatorio',
            'photos.required'=>'La fotografía del producto es obligatorio',
            'numeric'=>'Solo se pueden ingresar números',
            'price.min'=>'El valor del precio debe de ser mayor a 0',
            'price.max'=>'El valor del precio debe ser menor a $50,000'
        ];

        $this->validate($request, $camps, $message);

        $dataProduct = request()->except('_token');

        $request->validate([
            'photos' => 'required|image|max:10100'  
        ]);

        if($request->hasFile('photos')){
            $dataProduct['photos']=$request->file('photos')->store('uploads','public');
        }

        $dataProduct['user_id'] = auth()->user()->id;
        Products_user::insert($dataProduct);

        return redirect(route('productsUser-index'))->with('message', 'Enhorabuena! El producto se ha creado exitosamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $products=Products_user::findOrFail($id);
        return view('user.product-edit', compact('products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $camps = [
            'tittle'=>'required|string|max:25',
            'description'=>'required|string|max:530',
            'specifications'=>'required|string|max:1220',
            'price' => 'required|numeric|min:0|max:50000',
        ];
        $message=[
            'tittle.max'=>'El título del producto no debe ser mayor a 25 caracteres (Incluyendo espacios)',
            'description.max'=>'La descripcción del producto no debe exceder más de 530 caracteres (Incluyendo espacios)',
            'specifications.max'=>'Las especificaciones del producto no debe exceder más de 1220 caracteres (Incluyendo espacios)',
            'tittle.required'=>'El título del producto es obligatorio',
            'description.required'=>'La descripcción del producto es obligatorio',
            'specifications.required'=>'Las especificaciones del producto son obligatorios',
            'price.required'=>'El precio del producto es obligatorio',
            'numeric'=>'Solo se pueden ingresar números',
            'price.min'=>'El valor del precio debe de ser mayor a 0',
            'price.max'=>'El valor del precio debe ser menor a $50,000'
        ];

        if($request->hasFile('photos')){
            $camps=[ 'photos'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $message=['photos.required'=>'La fotografía del producto es obligatorio'];
        }

        $this->validate($request, $camps, $message);

        //
        $dataProduct = request()->except(['_token','_method']);

        if($request->hasFile('photos')){
            $products=Products_user::findOrFail($id);

            Storage::delete('public/'.$products->photos);

            $dataProduct['photos']=$request->file('photos')->store('uploads','public');
        }

        Products_user::where('id','=',$id)->update($dataProduct);
        $products=Products_user::findOrFail($id);
        return redirect('/productsUser')->with('message', 'El producto se ha editado y actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $products=Products_user::findOrFail($id);

        if(Storage::delete('public/'.$products->photos)){
            
            Products_user::destroy($id);
        
        };

        return redirect('productsUser')->with('message', 'El producto se ha eliminado con éxito!');
    }
}