<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', [
            'brands' => $brands
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required'
        ]);
        Brand::create([
            'brand_name' => $request->input('brand'),
            'status' => 1
        ]);
        return redirect()->route('brand');
    }
    public function update(Request $request, $brandId)
    {
        $request->validate([
            'brand' => 'required'
        ]);
        Brand::where('id', $brandId)
            ->update([
                'brand_name' => $request->input('brand'),
                // 'status' => $request->input('status')
            ]);
        return redirect()->route('brand');
    }
    public function edit($brandId)
    {
        $brand = Brand::findOrFail($brandId);
        return view('brand.edit', [
            'brand' => $brand
        ]);
        return redirect()->route('brand');
    }
    public function create()
    {
        return view('brand.create');
    }
    public function destroy($brandId)
    {
        $brand = Brand::findOrFail($brandId);
        $brand->delete();
        return redirect()->route('brand');
    }
}
