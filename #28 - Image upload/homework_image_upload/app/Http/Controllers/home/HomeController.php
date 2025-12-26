<?php

namespace App\Http\Controllers\home;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    //

    public function index(): View {

        Cache::remember('lastProducts',300,fn()=>Product::latest()->take(9)->get());
        return view('home.index',['products'=>Cache::get('lastProducts')]);
    }
}
