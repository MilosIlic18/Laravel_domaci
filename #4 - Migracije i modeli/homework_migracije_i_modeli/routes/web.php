<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;

Route::get("/",[HomepageController::class,"index"]);
Route::get("/shop",[ShopController::class,"index"]);
Route::get("/contact",[ContactController::class,"index"]);
Route::get("/admin/all-contacts",[ContactController::class,"getAllContacts"]);


Route::view("/about","pages.about");