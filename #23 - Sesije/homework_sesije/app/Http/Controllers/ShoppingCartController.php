<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCartRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    //
    private $productRepo;
    public function __construct(ProductRepository $productRepo){

        $this->productRepo = $productRepo;
    }

    public function index() {
        $productsInCard = [];
        if(Session::get('cart')!==null){
            $ids = array_map(function($item){
                return $item['id'];
            },Session::get('cart'));
            $productsInCard = $this->productRepo->getCartProduct($ids);
        }

        return view("pages.cart",["cart"=>$productsInCard]);
    }

    public function store(StoreCartRequest $storeCartRequest){
        $product = $this->productRepo->checkAmountProduct($storeCartRequest->id);

        if(intval($storeCartRequest->amount) <= intval($product->amount)){
            Session::push('cart',$storeCartRequest->all());
            return redirect()->route('cart.index');
        }
        return redirect()->route('product.permalink',$product)->with("error","Zao nam je nemamo trenutno toliku kolicinu artikla {$product->name} na stanju."); 
    } 
}
