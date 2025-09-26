<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $products = ["Iphone 14","Samsung A52s","Samsung A30","Iphone 13 pro"];
        return view("pages.shop",["products"=>$products]);
    }
}
