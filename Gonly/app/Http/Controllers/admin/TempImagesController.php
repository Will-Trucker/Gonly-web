<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempImage;
use Image;

class TempImagesController extends Controller
{
    public function create(Request $request){
     $image = $request->image;

       if (!empty($image)){
         $ext = $image->getClientOriginalExtension();
         $newName = time().'.'.$ext;

         $tempImage = new TempImage();
         $tempImage->name = $newName;
         $tempImage->save();

         $image->move(public_path().'/temp',$newName);

         // Desarrollo del Thumbnail
         $sourcePath = public_path().'/temp/'.$newName;
         $destPath = public_path().'/temp/thumb/'.$newName;
         $image = Image::make($sourcePath);
         $image->fit(300,275);
         $image->save($destPath);

         return response()->json([
            'status' => true,
            'image_id' => $tempImage->id,
            'ImagePath' => asset('/temp/thumb/'.$newName),
            'message' => 'Imagen subida correctamente / Image uploaded successfully'
         ]);
       }
/*
      if ($request->image){
         $image = $request->image;
         $extension = $image->getClientOriginalExtension();
         $newFileName = time().'.'.$extension;

         $tempImage = new TempImage();
         $tempImage->name = $newFileName;
         $tempImage->save();

         $image->move(public_path('uploads/temp'),$newFileName);

         return response()->json([
            'status' => true,
            'name' => $newFileName,
            'id' => $tempImage->id
         ]);
      }
      */
    }
}
