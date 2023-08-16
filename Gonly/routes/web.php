<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\admin\BrandController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'  => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'], function(){
 
     Route::get('/login', [App\Http\Controllers\admin\AdminLoginController::class, 'indexl'])->name('admin.login');
     Route::post('/authenticate', [App\Http\Controllers\admin\AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
 
 
 
    });
 
    Route::group(['middleware' => 'admin.auth'], function(){
 
     Route::get('/dashboard', [App\Http\Controllers\admin\HomeController::class, 'indexl'])->name('admin.dashboard');
     Route::get('/logout', [App\Http\Controllers\admin\HomeController::class, 'logout'])->name('admin.logout');
 
     // Categorias
     Route::get('/categories', [App\Http\Controllers\admin\CategoryController::class, 'index'])->name('categories.index');
     Route::get('/categories/create', [App\Http\Controllers\admin\CategoryController::class, 'create'])->name('categories.create');
     Route::post('/categories', [App\Http\Controllers\admin\CategoryController::class, 'store'])->name('categories.store');
     Route::get('/categories/{category}/edit', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('categories.edit');
     Route::put('/categories/{category}', [App\Http\Controllers\admin\CategoryController::class, 'update'])->name('categories.update');
     Route::delete('/categories/{category}', [App\Http\Controllers\admin\CategoryController::class, 'destroy'])->name('categories.delete');
 
     // Sub-Categorias
     Route::get('/sub-categories', [App\Http\Controllers\admin\SubCategoryController::class, 'index'])->name('sub-categories.index');
     Route::get('/sub-categories/create', [App\Http\Controllers\admin\SubCategoryController::class, 'create'])->name('sub-categories.create');
     Route::post('/sub-categories', [App\Http\Controllers\admin\SubCategoryController::class, 'store'])->name('sub-categories.store');
     Route::get('/sub-categories/{subCategory}/edit', [App\Http\Controllers\admin\SubCategoryController::class, 'edit'])->name('sub-categories.edit');
     Route::put('/sub-categories/{subCategory}', [App\Http\Controllers\admin\SubCategoryController::class, 'update'])->name('sub-categories.update');
     Route::delete('/sub-categories/{subCategory}', [App\Http\Controllers\admin\SubCategoryController::class, 'destroy'])->name('sub-categories.delete');
 
     // Marcas
     Route::get('/brands', [App\Http\Controllers\admin\BrandController::class, 'index'])->name('brands.index');
     Route::get('/brands/create', [App\Http\Controllers\admin\BrandController::class, 'create'])->name('brands.create');
     Route::post('/brands', [App\Http\Controllers\admin\BrandController::class, 'store'])->name('brands.store');
     Route::get('/brands/{brand}/edit', [App\Http\Controllers\admin\BrandController::class, 'edit'])->name('brands.edit');
     Route::put('/brands/{brand}', [App\Http\Controllers\admin\BrandController::class, 'update'])->name('brands.update');
     Route::delete('/brands/{brands}', [App\Http\Controllers\admin\BrandController::class, 'destroy'])->name('brands.delete');
 
 
     // Subir imagenes
     Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');
 
     Route::get('/getSlug', function(Request $request){
           $slug = '';
            if(!empty($request->title)){
               $slug = Str::slug($request->title);
            } 
            return response()->json([
               'status' => true,
               'slug' => $slug
            ]);
     })->name('getSlug');
 
    });
 });