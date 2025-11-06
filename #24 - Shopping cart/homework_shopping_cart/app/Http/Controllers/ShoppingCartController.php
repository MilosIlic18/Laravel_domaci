<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\CartHelper;
use App\Repositories\OrderRepository;
use App\Http\Requests\StoreCartRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;
use App\Repositories\OrderItemRepository;

class ShoppingCartController extends Controller
{
    //
    private $productRepo;
    private $orderRepo;
    private $orderItemRepo;
    public function __construct(ProductRepository $productRepo, OrderRepository $orderRepo, OrderItemRepository $orderItemRepo){
        $this->productRepo   = $productRepo;
        $this->orderRepo     = $orderRepo;
        $this->orderItemRepo = $orderItemRepo;
    }

    public function index() {
        $productsInCard = Session::get('cart')!==null?$this->productRepo->getCartProduct(array_map(function($item){return $item['id'];},Session::get('cart'))):[];
        return view("pages.cart",["cart"=>$productsInCard]);
    }

    public function store(StoreCartRequest $storeCartRequest){
        $product = $this->productRepo->checkAmountProduct($storeCartRequest->id);

        return intval($storeCartRequest->amount) <= intval($product->amount)
            ? tap(redirect()->route('cart.index'), fn() => Session::push('cart', $storeCartRequest->all()))
            : redirect()->route('product.permalink', $product)
                ->with('error', "Izvinjavamo se! Trenutno nemamo traženu količinu artikla {$product->name} na zalihama.");
    }

    public function orderStore(){
        $productsInCard = $this->productRepo->getCartProduct(array_map(function($item){return $item['id'];},Session::get('cart')));
        $totalPrice = 0;
        foreach($productsInCard as $product){
            $amountProductInCard = CartHelper::getAmountCard($product);
            if($amountProductInCard > $product->amount)
                return back()->with("info","Nije moguce izvrsiti narudzbinu – nema dovoljno zaliha");
            $totalPrice      += $amountProductInCard * $product->price;
            $this->productRepo->edit(null,tap($product)->decrement('amount', $amountProductInCard));
        }
        $order = $this->orderRepo->store($totalPrice);
        $this->orderItemRepo->store($productsInCard,$order);

        Session::forget("cart");
        return view("pages.thanks");
    }
    public function destroy(){
        Session::forget("cart");
        return back();
    }
}
