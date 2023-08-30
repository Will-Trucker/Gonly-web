<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Products_user;
use App\Models\Products;

use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('user.options-product');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user.more-images-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'file' =>  'required|image',
        ]); 

        $productsImages = $request->file('file')->store('public/images-product');

        $url = Storage::url($productsImages);

        $modelProducts = Products_user::find($id); // Asegúrate de ajustar el nombre del campo según corresponda
        
        Images::create([
            'products_user_id' => $modelProducts->id,
            'url' => $url
        ]);

        $user_id = auth()->user()->id;

        $product = Products_user::where('user_id', $user_id)->where('id', $id)->firstOrFail();

        /*return view('user.options-product', compact('product'));*/

    }

    /**
     * Display the specified resource.
     */
    public function show($moreimg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    /*
    public function edit(string $id)
    {
        //
    }
    */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($moreimg)
    {
        //
    }
}
