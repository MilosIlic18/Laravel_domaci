<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Middleware\AdminCheckMiddleware;

Route::get("/",[HomepageController::class,"index"])->name("index");
Route::get("/shop",[ShopController::class,"index"])->name("shop");
Route::view("/about","pages.about")->name("about");

Route::view("/contact","pages.contact")->name("contact");
Route::controller(ContactController::class)->prefix("/contacts")->name("contact.")->group(function(){
    Route::post("","store")->name("store");
});

Route::middleware(['auth',AdminCheckMiddleware::class])->prefix("/admin")->group(function(){
    Route::redirect('','admin/products')->name("admin.index");
    
    Route::view("product","pages.addProduct")->name("product");    
    
    Route::controller(ProductController::class)->prefix("/products")->name("product.")->group(function(){
        Route::get("","index")->name("index");

        Route::get("{product}","show")->name("show");
        Route::put("{product}","update")->name("edit");
        
        Route::post("","store")->name("store");
        Route::get("delete/{product}","destroy")->name("destroy");
    });
    
    Route::controller(ContactController::class)->prefix("/contacts")->name("contact.")->group(function(){
        Route::get("","index")->name("index");
        
        Route::get("{contact}","show")->name("show");
        Route::put("{contact}","update")->name("edit");

        Route::get("delete/{contact}","destroy")->name("destroy");
    });
});

Route::get('/logout',function (){
    Auth::logout();
    return redirect('/');
    
})->middleware('auth')->name('logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
