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
    
    public function show(Product $product){
        return view("pages.editProduct",["product"=>$product]);
    }
    
    function store(Request $request) {
        $request->validate([
            "name"          => "required|string|min:5|unique:products",
            "amount"        => "required|integer|min:0",
            "price"         =>  "required|numeric|min:1",
            "image"         =>  "required|url",
            "description"   =>  "required|string",
        ]);
        
        Product::create($request->all());
        return redirect()->route('product.index');
    }
    
    function update(Request $request,Product $product) {
        $request->validate([
            "name"          => "required|string|min:5",
            "amount"        => "required|integer|min:0",
            "price"         =>  "required|numeric|min:1",
            "image"         =>  "required|url",
            "description"   =>  "required|string",
        ]);
        
        $product->update($request->all());
        return redirect()->route('product.index');
    }

    function destroy(Product $product) {
        $product->delete();
        return back();
    }
}
