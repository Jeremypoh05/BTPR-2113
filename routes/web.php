<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/addProduct', function () {
    return view ('addProduct');
});

//the first /addProduct/store used by browser and the end the name('addProduct') used by the internal html file
Route::post("/addProduct/store",[App\Http\Controllers\ProductController::class, 'add'])->name('addProduct');

//show
Route::get("/showProduct",[App\Http\Controllers\ProductController::class, 'view'])->name('showProduct');

//delete
Route::get("/deleteProduct/{id}",[App\Http\Controllers\ProductController::class, 'delete'])->name('deleteProduct');

//edit
Route::get("/editProduct/{id}",[App\Http\Controllers\ProductController::class, 'edit'])->name('editProduct');

//update the product (this time we use route format in(editProduct.blade), so it a must we set the name ('updateProduct') )
Route::post("/updateProduct",[App\Http\Controllers\ProductController::class, 'update'])->name('updateProduct');

Route::get("/productDetail/{id}",[App\Http\Controllers\ProductController::class, 'productDetail'])->name('product.detail');

//addCart
Route::post("/addCart",[App\Http\Controllers\CartController::class, 'addCart'])->name('addCart');

Route::get('/myCart',[App\Http\Controllers\CartController::class, 'view'])->name('myCart');

//view all products 
Route::get('/viewProducts',[App\Http\Controllers\ProductController::class, 'viewProduct'])->name('viewProducts');

// Search Product
Route::post('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
