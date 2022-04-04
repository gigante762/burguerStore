<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function uploadImage(Request $request, Product $product)
    {
        foreach ($request->images as $image) {
            if($image->isValid())
            {
                $path = $image->store('images','public');

                $i = Image::create([
                    'path' => $path,
                    'url' => url('storage') .'/'. $path,
                    'product_id' => $product->id
                ]);

                $product->images()->attatch($i->id);
            }
        }

        return redirect()->route('products.index');
    }

    public function deleteImage(Request $request, Product $product)
    {
        // just one image
        $image = $product->images()->where('id', $request->image_id)->first();
        
        Storage::disk('public')->delete($image->path);
        
        $image->delete();

        return redirect()->route('products.index');
    }
}
