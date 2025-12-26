<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\product\ProductController;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::view('/products','product.create')->name('products.add');
Route::controller(ProductController::class)->prefix('/products')->name('products.')->group(function(){
    Route::post('','store')->name('store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/change-avatar', [ProfileController::class, 'changeAvatar'])->name('profile.changeAvatar');
});

require __DIR__.'/auth.php';
