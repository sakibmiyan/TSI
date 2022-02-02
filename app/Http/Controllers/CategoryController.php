<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', [
            'categories' => $categories
        ]);
    }
    public function edit($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        return view('category.edit', [
            'category' => $category
        ]);
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        Category::create([
            'category_name' => $request->input('category_name'),
            'status' => 1
        ]);
        return redirect()->route('category');
    }
    public function update(Request $request, $categoryId)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        Category::where('id', $categoryId)
            ->update([
                'category_name' => $request->input('category_name'),
                // 'status' => $request->input('status')
            ]);
        return redirect()->route('category');
    }
    public function destroy($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();
        return redirect()->route('category');
    }
}
