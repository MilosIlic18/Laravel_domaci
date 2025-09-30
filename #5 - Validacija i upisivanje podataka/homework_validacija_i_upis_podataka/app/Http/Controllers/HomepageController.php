<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index() {
        $sat= date('H');
        $trenutnoVreme = date('H:i:s');
        return view("pages.welcome",['trenutnoVreme'=>$trenutnoVreme,'sat'=>$sat,'products'=>Product::latest()->limit(6)->get()]);
    }
}
