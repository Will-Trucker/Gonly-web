<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{

    public function index(Request $request){
       $brands = Brand::latest('id');

       if(!empty($request->get('keyword'))){
        $brands = $brands->where('name','like','%'.$request->keyword.'%');
      }

       $brands = $brands->paginate(10);
       
       return view('admin.brands.list',compact('brands'));

    }

    public function create(){
        return view('admin.brands.create');
    }

    public function store(Request $request){
       $validator = Validator::make($request->all(),[
        'name' => 'required',
        'slug' => 'required|unique:brands'
       ]);        


       if ($validator->passes()){
          $brand = New Brand();
          $brand->name = $request->name;
          $brand->slug = $request->slug;
          $brand->status = $request->status;
          $brand->save();
         
          $request->session()->flash('success',trans('messages.brands_added_success'));

          return response()->json([
            'status' => true,
            'message' => 'Marca agregada con éxito / Brands added succesfully'
          ]);

       } else {
         return response()->json([
            'status' => false,
            'errors' => $validator->errors()
         ]);
       }
    }

    public function edit($id, Request $request){
        $brand = Brand::find($id);

        if (empty($brand)){
           $request->session()->flash('error', trans('messages.brands_error'));

          return redirect()->route('brands.index');          
        }
        $data['brand'] = $brand;
        return view('admin.brands.edit',$data); 
        
    }

    public function update($id, Request $request){

        $brand = Brand::find($id);

        if (empty($brand)){
           $request->session()->flash('error',trans('messages.brands_error'));

           return response()->json([
              'status' => false,
              'notFound' => true
           ]);

          //return redirect()->route('brands.index');          
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,'.$brand->id.',id'
           ]);        
    
    
           if ($validator->passes()){
              $brand = New Brand();
              $brand->name = $request->name;
              $brand->slug = $request->slug;
              $brand->status = $request->status;
              $brand->save();
    
              $request->session()->flash('success', trans('messages.brands_edit'));

              return response()->json([
                'status' => true,
                'message' => 'Marca editada con éxito / Brands edited successfully'
              ]);
    
           } else {
             return response()->json([
                'status' => false,
                'errors' => $validator->errors()
             ]);
           }
    }

    public function destroy($id, Request $request){
       $brand = Brand::find($id);

       if (empty($brand)){
         $request->session()->flash('error',trans('messages.brands_error'));
         
         return response([
            'status' => false,
            'notFound' => true
          ]);

       }

       $brand->delete();

       $request->session()->flash('success',trans('messages.brands_delete'));

       return response([
        'status' => true,
        'message' => 'Marca Eliminada exitosamente / Brands delete successfully'
     ]);

      
    }

}
