<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->get();

        //dd($products);

        return view('site.index',[
            'products' => $products
        ]);
    }

    public function show(Product $product)
    {
        return view('site.show',[
            'product' => $product
        ]);
    }
}
