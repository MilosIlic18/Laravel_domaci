<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    //
    private $productRepo;
    public function __construct(ProductRepository $productRepo){

        $this->productRepo = $productRepo;
    }

    function index() {

        return view("pages.allProducts",["products"=>Product::all()]);
    }
    
    public function show(Product $product){

        return view("pages.editProduct",["product"=>$product]);
    }
    
    function store(StoreProductRequest $request) {
        
        $this->productRepo->store($request);
        return redirect()->route('product.index');
    }
    
    function update(EditProductRequest $request,Product $product) {

        $this->productRepo->edit($request,$product);
        return redirect()->route('product.index');
    }

    function destroy(Product $product) {
        
        $this->productRepo->destroy($product);
        return back();
    }
}
