<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
       Category::create($request->only('name'));


       return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->only('name'));

        return redirect()->route('categories.index');
    }
    
    public function destroy(Request $request, Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index');
    }
}
