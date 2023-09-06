<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProductsUserController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryPController;
use App\Http\Controllers\SubCategoryPController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\ProductImageController;

use Illuminate\Http\Request;
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
Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('dashboard', [ProductsUserController::class, 'dasboardPresent'])->middleware(['auth', 'verified'])->name('dashboard');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/information', function () {
    return view('information');
})->name('information');


Route::get('/products', function () {
    return view('products/showProducts');
})->name('products');


Route::resource('productsUser', ProductsUserController::class)->middleware(['auth', 'verified']);
Route::get('productsUser', [ProductsUserController::class, 'index'])->middleware(['auth', 'verified'])->name('productsUser-index');
Route::get('productsUser/create', [ProductsUserController::class, 'create'])->middleware(['auth', 'verified'])->name('productsUser-create');
Route::post('productsUser/store', [ProductsUserController::class, 'store'])->middleware(['auth', 'verified'])->name('productsUser-store');
Route::get('product/index', [SubCategoryProductUserController::class, 'index'])->name('productCategoryUser');

Route::prefix('/products/{id}/preview/')->group(function() {
    // Ruta para subir imagenes adicionales
    Route::resource('moreimg', ImagesController::class)->middleware(['auth', 'verified']);
    
})->middleware(['auth', 'verified']);

Route::get('categories', function () {
    return view('categories');
})->name('categories');

Route::get('/products/{id}/preview', [ProductsUserController::class, 'additionalView'])->name('additional-view')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Shopping Cart
Route::get('/cart',[App\Http\Controllers\CartController::class, 'cart'])->name('shop.cart');
Route::post('/add-to-cart',[App\Http\Controllers\CartController::class, 'addToCart'])->name('shop.addToCart');

//Route::get('/shop/{categorySlug}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.index');


Route::get('/shop/{categorySlug?}/{subCategorySlug?}',[App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');

Route::get('/product/{slug}',[App\Http\Controllers\ShopController::class, 'product'])->name('shop.product');



/*
Route::get('/category',[App\Http\Controllers\CategoryPController::class, 'index'])->name('categories.index');

Route::get('/category/{category}', [App\Http\Controllers\SubCategoryPController::class, 'index'])->name('subcategories.index');

Route::get('/category/{category}/{subcategory}', 'ProductoController@index')->name('productos.index');
*/

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
// Rutas del administrador

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

    // Productos
    Route::get('/products', [App\Http\Controllers\admin\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [App\Http\Controllers\admin\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [App\Http\Controllers\admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [App\Http\Controllers\admin\ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [App\Http\Controllers\admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [App\Http\Controllers\admin\ProductController::class, 'destroy'])->name('products.delete');

    Route::get('/product-subcategories', [ProductSubCategoryController::class, 'index'])->name('product-subcategories.index');

    Route::post('/product-images/update', [App\Http\Controllers\admin\ProductImageController::class, 'update'])->name('product-images.update');

    Route::delete('/product-images', [App\Http\Controllers\admin\ProductImageController::class, 'destroy'])->name('product-images.destroy');

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


