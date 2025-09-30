<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomepageController;

Route::get("/",[HomepageController::class,"index"]);
Route::get("/shop",[ShopController::class,"index"]);

Route::controller(ContactController::class)->prefix("/contact")->group(function(){
    Route::get("","index");
    Route::post("","store");
});

Route::prefix("/admin")->group(function(){
    Route::get("add-product",[ProductController::class,"addProduct"]);
    
    Route::controller(ProductController::class)->prefix("/products")->group(function(){
        Route::get("","index");
        Route::post("","store");
    });

    

    Route::get("all-contacts",[ContactController::class,"getAllContacts"]);
});


Route::view("/about","pages.about");