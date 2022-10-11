<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('product/create_product',function(){
    $cats = Category::paginate();
    return view('product/create_product',compact('cats'));
})->name('create_product.index');

Route::get('category/index',[CategoryController::class,'category'])->name('category.index');

Route::post('category/insert',[CategoryController::class,'created'])->name('category.insert');

Route::get('product/index',[ProductController::class,'list_product'])->name('product.index');

Route::post('product/create',[ProductController::class,'create_product'])->name('product.create');

Route::delete('category/delete/{cat}',[CategoryController::class,'delete'])->name('category.delete');

Route::get('category/edit/{cat}',[categoryController::class,'edit'])->name('category.edit');

Route::put('category/update/{cat}',[CategoryController::class,'update'])->name('category.update');