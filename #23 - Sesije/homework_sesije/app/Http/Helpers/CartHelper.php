<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Session;

class CartHelper{

    public static function getAmountCard($item){
        return  array_find(Session::get('cart'),function($product) use ($item) {
                                if(intval($product['id'])===$item->id)
                                    return $product['amount'];
                 })['amount'];
    }
}