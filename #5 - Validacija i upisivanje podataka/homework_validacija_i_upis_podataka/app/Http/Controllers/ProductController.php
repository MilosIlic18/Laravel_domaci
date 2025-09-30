<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index() {
        return view("pages.allProducts",["products"=>Product::all()]);
    }
    function store(Request $request) {
        $request->validate([
            "name"          => "required|string|min:5",
            "amount"        => "required|integer|min:0",
            "price"         =>  "required|numeric|min:1",
            "image"         =>  "required|url",
            "description"   =>  "required|string",
        ]);
        Product::create($request->all());
        return redirect('/admin/products');
    }

    function addProduct() {
        return view("pages.addProduct");
    }
}
