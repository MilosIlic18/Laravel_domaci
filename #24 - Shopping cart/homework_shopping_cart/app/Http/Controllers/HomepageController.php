<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class HomepageController extends Controller
{
    //
    private $productRepo;
    public function __construct(ProductRepository $productRepo){

        $this->productRepo = $productRepo;
    }
    public function index() {
        $hour       = date('H');
        $curentTime = date('H:i:s');
        return view("pages.welcome",['currentTime'=>$curentTime,'hour'=>$hour,'products'=>$this->productRepo->getSixLatestProducts()]);
    }
}
