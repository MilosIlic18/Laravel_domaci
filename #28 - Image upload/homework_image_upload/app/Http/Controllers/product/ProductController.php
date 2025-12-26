<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\product\StoreProductRequest;

class ProductController extends Controller
{
    //

    public function store(StoreProductRequest $request): RedirectResponse {

        Product::create($request->validated());
        Cache::forget('lastProducts');
        return redirect()->route('home');
    }

    public function flush(): RedirectResponse {
        
        Cache::forget('lastProducts');
        return redirect()->route('home');
    }
}
