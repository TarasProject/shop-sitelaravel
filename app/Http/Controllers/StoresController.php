<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    public function index() {
        $ifStores=Store::get();
        return view('stores/index',compact('ifStores'));
    }

    public function store($id){
        $ifStores=Store::find($id);
        $products = Product::get();
        return view('stores.store',compact('products','id'));
    }
}
