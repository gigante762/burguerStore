<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        Product::create($request->only('name', 'description', 'price', 'category_id'));

        return redirect()->route('products.index');
    }


    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.index');
    }
    
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');

    }
}
