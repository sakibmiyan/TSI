<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $ordered = 0;
        foreach ($products as $product) {
            $ordered = 0;
            foreach ($product->orderItems as $item) {
                $ordered += $item->quantity;
            }
        }
        return view('product.index', [
            'products' => $products,
            'ordered' => $ordered
        ]);
    }
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('product.create', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'brand_id' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'rate' => 'required'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Product::create([
            'product_name' => $request->input('product_name'),
            'image_path' => $newImage,
            'brand_id' => $request->input('brand_id'),
            'category_id' => $request->input('category_id'),
            'quantity' => $request->input('quantity'),
            'rate' => $request->input('rate'),
            'status' => 1
        ]);
        return redirect()->route('product');
    }
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $brands = Brand::all();
        $categories = Category::all();
        return view('product.edit', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        unlink(base_path('public/storage/images/' . $product->image_path));
        $request->validate([
            'product_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'brand_id' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'rate' => 'required'
        ]);
        $newImage = time() . $request->name . "." . $request->image->extension();
        $request->image->move(base_path('public/storage/images'), $newImage);
        Product::where('id', $productId)
            ->update([
                'product_name' => $request->input('product_name'),
                'image_path' => $newImage,
                'brand_id' => $request->input('brand_id'),
                'category_id' => $request->input('category_id'),
                'quantity' => $request->input('quantity'),
                'rate' => $request->input('rate'),
                // 'status' => $request->input('status')
            ]);
        return redirect()->route('product');
    }
    public function destroy($productId)
    {
        $product = Product::findOrFail($productId);
        unlink(base_path('public/storage/images/' . $product->image_path));
        $product->delete();
        return redirect()->route('product');
    }
}
