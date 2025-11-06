<?php

namespace App\Repositories;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository{
    private $order;
    public function __construct(Order $order){

        $this->order = $order;
    }

    public function store($totalPrice){

        return $this->order::create([
            'users_id'=>Auth::user()->id,
            'price'=>$totalPrice,
            
        ]);
    }
}