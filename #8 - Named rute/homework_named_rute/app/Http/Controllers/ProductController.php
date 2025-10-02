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
    
    public function show($product_id){
        $product = Product::find(["id"=>$product_id])->first();
        if($product === null)
            return redirect()->route('product.index');
        return view("pages.editProduct",["product"=>Product::find(["id"=>$product_id])->first()]);
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
    
    function update(Request $request) {
        $request->validate([
            "name"          => "required|string|min:5",
            "amount"        => "required|integer|min:0",
            "price"         =>  "required|numeric|min:1",
            "image"         =>  "required|url",
            "description"   =>  "required|string",
        ]);
        $product = Product::find(["id"=>$request->id])->first();
        if($product === null)
            return back();

        $product->update($request->all());
        return redirect()->route('product.index');
    }

    function destroy($product_id) {
        $product = Product::where(["id"=>$product_id])->first();
        if($product === null)
            return back();

        $product->delete();
        return back();
    }
}
