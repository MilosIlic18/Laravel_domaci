<?php

namespace App\Repositories;

use App\Models\OrderItem;
use App\Http\Helpers\CartHelper;

class OrderItemRepository{
    private $orderItem;
    public function __construct(OrderItem $orderItem){

        $this->orderItem = $orderItem;
    }

    public function store($productsInCard,$order){
        foreach($productsInCard as $product){
            $this->orderItem::create([
                "orders_id" =>$order->id,
                "products_id"=>$product->id,
                "amount"=>CartHelper::getAmountCard($product),
                "price"=>$product->price
            ]);
        }

        return;
    }
}