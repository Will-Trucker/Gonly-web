<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ImagesController;

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
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('products', ProductsController::class)->middleware(['auth', 'verified']);

Route::prefix('/products/{id}/preview/')->group(function() {
    // Ruta para subir imágenes adicionales
    Route::resource('moreimg', ImagesController::class)->middleware(['auth', 'verified']);
    
})->middleware(['auth', 'verified']);

Route::get('categories', function () {
    return view('categories');
})->name('categories');

Route::get('/products/{id}/preview', [ProductsController::class, 'additionalView'])->name('additional-view')->middleware(['auth', 'verified']);

/*Route::get('', function ($id) {
    return view('user.options-product');
});*/

require __DIR__.'/auth.php';

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);