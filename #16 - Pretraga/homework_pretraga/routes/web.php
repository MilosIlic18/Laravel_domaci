<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\HomepageController;
use App\Http\Middleware\UserCheckMiddleware;
use App\Http\Middleware\AdminCheckMiddleware;



Route::prefix('/')->name('user.')->group(function() {
    Route::get('', [HomePageController::class,"index"] )->name('index');
    
    Route::controller(ForecastController::class)->prefix('forecasts')->name("forecast.")->group(function(){
        Route::get('','search')->name("index");
    });
});


Route::middleware(['auth',AdminCheckMiddleware::class])->prefix('/admin')->group(function() {
    Route::redirect('','admin/weathers')->name("admin.index");
    Route::view('weather','pages.admin.weather.add')->name("weather.add");

    

    Route::controller(ForecastController::class)->prefix('forecasts')->name("forecast.")->group(function(){
        Route::get('','index')->name("index");
        Route::post('','store')->name("store");
        Route::get('{city:name}','show')->name('show');
    });

    
    Route::controller(WeatherController::class)->prefix('weathers')->name("weather.")->group(function(){
        Route::get('','index')->name("index");
        Route::post('','store')->name("store");
        
        Route::get('{weather}','show')->name("show");
        Route::put('{weather}','update')->name("edit");
        Route::get('delete/{weather}','destroy')->name("destroy");
    });    
});



Route::get('/logout',function (){
    Auth::logout();
    return redirect('/login');
    
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
