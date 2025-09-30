<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GradeController;

Route::get("/",[HomeController::class,"index"]);
Route::view("/add-grade","pages.grade.add");
Route::controller(GradeController::class)->prefix("/grade")->group(function(){
    Route::post("","store");
});