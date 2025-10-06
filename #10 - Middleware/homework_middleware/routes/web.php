<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\HomepageController;
use App\Http\Middleware\UserCheckMiddleware;
use App\Http\Middleware\AdminCheckMiddleware;

Route::get('/', [HomePageController::class,"index"] )->middleware(['auth',UserCheckMiddleware::class]);

Route::get('/logout',function (){
    Auth::logout();
    return redirect('/login');
    
})->middleware('auth')->name('logout');

Route::middleware(['auth',AdminCheckMiddleware::class])->prefix('/admin')->group(function() {
    Route::redirect('','admin/weathers')->name("admin.index");

    Route::view('weather','pages.admin.weather.add')->name("weather.add");
    Route::controller(WeatherController::class)->prefix('weathers')->group(function(){
        Route::get('','index')->name("weather.index");
        Route::post('','store')->name("weather.store");
        
        Route::get('{cities}','show')->name("weather.show");
        Route::put('{cities}','update')->name("weather.edit");
        Route::get('delete/{cities}','destroy')->name("weather.destroy");
    });    
});
















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
