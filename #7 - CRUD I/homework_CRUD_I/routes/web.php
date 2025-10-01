<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomepageController;

Route::get("/",[HomepageController::class,"index"]);
Route::get("/shop",[ShopController::class,"index"]);

Route::view("/contact","pages.contact");
Route::controller(ContactController::class)->prefix("/contacts")->group(function(){
    Route::post("","store");
});

Route::prefix("/admin")->group(function(){
    
    Route::view("add-product","pages.addProduct");    
    Route::controller(ProductController::class)->prefix("/products")->group(function(){
        Route::get("","index");
        Route::post("","store");
        Route::get("{product}","destroy");
    });
    
    Route::controller(ContactController::class)->prefix("/contacts")->group(function(){
        Route::get("","index");
        Route::get("{contact}","destroy");
    });
});


Route::view("/about","pages.about");