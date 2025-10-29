<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository{
    private $product;
    public function __construct(Product $product){

        $this->product = $product;
    }

    public function store($request){

        return $this->product::create($request->all());
    }

    public function edit($request,Product $product){
        
        return $product->update($request->all());
    }

    public function destroy(Product $product) {
        
        return $product->delete();
    }

    public function getSixLatestProducts(){
        return Product::latest()->limit(6)->get();
    }
}