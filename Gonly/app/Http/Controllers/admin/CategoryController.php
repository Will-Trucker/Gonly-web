<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
   public function index(Request $request){
     $categories = Category::latest();

     if(!empty($request->get('keyword'))){
      $categories = $categories->where('name','like','%'.$request->get('keyword').'%');
    }

    $categories = $categories->paginate(10);
    return view('admin.category.list', compact('categories'));
    
   }

   public function create(){
     return view('admin.category.create');
   }

   public function store(Request $request){
     $validator = Validator::make($request->all(),[
        'name' => 'required',
        'slug' => 'required|unique:categories',
        'image_id' => 'required'
     ]);

     if($validator->passes()){        
         $category = new Category();
         $category->name = $request->name;
         $category->slug = $request->slug;
         $category->status = $request->status;
         $category->save();

          //Almacenamiento de imagenes
/*         if(!empty($request->image_id)){
            $image = $request->file('image_id');
            $image->move(public_path().'/categories/',$image->getClientOriginalName()); 
            $category->image_path=$image->getClientOriginalName();
          }
*/

      if (!empty($request->image_id)) {
         $tempImage = TempImage::find($request->image_id);
         $extArray = explode('.',$tempImage->name);
         $ext = last($extArray);
 
         $newImageName = $category->id.'.'.$ext; 
         $sPath = public_path().'/temp/'.$tempImage->name;
         $dPath = public_path().'/uploads/category/'.$newImageName;
         File::copy($sPath,$dPath);

         // Implementacion de Imagenes Thumbnail
         $dPath = public_path().'/uploads/category/thumb/'.$newImageName;
         $img = Image::make($sPath);
         //$img->resize(450, 600);
         $img->fit(450, 600, function ($constraint) {
            $constraint->upsize();
        });

         $img->save($dPath);

         $category->image = $newImageName;
         $category->save();
       }


         $request->session()->flash('success', trans('messages.category_added_success'));

         return response()->json([
            'status' => true,
            'message' => 'Categoria agregada con éxito / Category added successfully'
         ]);
     } else {
        return response()->json([
           'status' => false,
           'errors' => $validator->errors()
        ]);
     }
   }

   public function edit($categoryId, Request $request){

    
    $category = Category::find($categoryId);

    if(empty($category)){
      return redirect()->route('categories.index');
    }
    
    return view('admin.category.edit',compact('category'));
     
   }

   public function update($categoryId, Request $request){

    
      $category = Category::find($categoryId);

      if(empty($category)){
      
       $request->session()->flash('error', trans('messages.category_error'));

       return response()->json([
        'status' => false,
        'notFound' => true,
        'message' =>  'Categoria no encontrada / Category not found'
       ]);
      }

      $validator = Validator::make($request->all(),[
         'name' => 'required',
         'slug' => 'required|unique:categories,slug,'.$category->id.',id',
     
      ]);
 
      if($validator->passes()){        
          
          $category->name = $request->name;
          $category->slug = $request->slug;
          $category->status = $request->status;
          $category->save();

          // Variable para imagen antigua
          $oldImage = $category->image;

         if (!empty($request->image_id)) {
          $tempImage = TempImage::find($request->image_id);
          $extArray = explode('.',$tempImage->name);
          $ext = last($extArray);
  
          $newImageName = $category->id.'-'.time().'.'.$ext; 
          $sPath = public_path().'/temp/'.$tempImage->name;
          $dPath = public_path().'/uploads/category/'.$newImageName;
          File::copy($sPath,$dPath);
 
          // Implementacion de Imagenes Thumbnail
          $dPath = public_path().'/uploads/category/thumb/'.$newImageName;
          $img = Image::make($sPath);
          //$img->resize(450, 600);
          $img->fit(450, 600, function ($constraint) {
            $constraint->upsize();
          });
          $img->save($dPath);
 
          $category->image = $newImageName;
          $category->save();

          // Eliminación de Imagenes Antiguas
          File::delete(public_path().'/uploads/category/thumb/'.$oldImage); // Eliminacion desde la carpeta temporal
          File::delete(public_path().'/uploads/category/'.$oldImage);  // Eliminacion desde la carpeta de category
        }
 
 
          $request->session()->flash('success',trans('messages.category_edit'));
 
          return response()->json([
             'status' => true,
             'message' => 'Categoria editada con éxito / Categoria edited successfully'
          ]);

      } else {
         return response()->json([
            'status' => false,
            'errors' => $validator->errors()
         ]);
      }
    
   }

   public function destroy($categoryId, Request $request){
      $category = Category::find($categoryId);
      
      if (empty($category)){
        $request->session()->flash('error',trans('messages.category_error'));
        return response()->json([
            'status' => true,
            'message' => 'Categoria no encontrada / Category not found'
        ]);
       
      } 

      File::delete(public_path().'/uploads/category/thumb/'.$category->image);
      File::delete(public_path().'/uploads/category/'.$category->image);

      $category->delete();

      $request->session()->flash('success',trans('messages.category_delete'));

      return response()->json([
         'status' => true,
         'message' => 'Categoria Eliminada exitosamente'
      ]);

   }
}
