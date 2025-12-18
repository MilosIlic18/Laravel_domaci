<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\product\ProductController;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::view('/products','product.create')->name('products.add');
Route::controller(ProductController::class)->prefix('/products')->name('products.')->group(function(){
    Route::post('','store')->name('store');
});