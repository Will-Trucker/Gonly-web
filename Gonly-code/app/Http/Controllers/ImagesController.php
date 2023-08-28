<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use App\Models\Products;

use Illuminate\Support\Facades\Storage;

class imagesController extends Controller
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

        Images::create([
            'url' => $url
        ]);

        $user_id = auth()->user()->id;

        $product = Products::where('user_id', $user_id)->where('id', $id)->firstOrFail();

        /*return view('user.options-product', compact('product'));*/

    }

    /**
     * Display the specified resource.
     */
    public function show($moreimg)
    {
        //
        return view('user.more-images-show-product');
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
