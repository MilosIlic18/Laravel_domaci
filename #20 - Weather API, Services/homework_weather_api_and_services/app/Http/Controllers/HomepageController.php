<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $hour       = date('H');
        $curentTime = date('H:i:s');
        return view("pages.welcome",['currentTime'=>$curentTime,'hour'=>$hour,'products'=>Product::latest()->limit(6)->get()]);
    }
}
