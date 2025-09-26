<?php

use Illuminate\Support\Facades\Route;

Route::view("/","pages.welcome");
Route::view("/about","pages.about");
Route::view("/shop","pages.shop");
Route::view("/contact","pages.contact");