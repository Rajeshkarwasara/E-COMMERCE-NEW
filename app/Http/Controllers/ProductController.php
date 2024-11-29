<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_list');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brands::all();
        return view('admin.add_product', compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|min:2|max:50|string',
                'price' => 'required|numeric',
                'sale_price' => 'nullable|numeric',
                'color' => 'required|string',
                'brand_id' => 'required|exists:brands,id',
                'product_code' => 'required|min:5',
                'gender' => 'required|in:male,female,children,unisex',
                'function' => 'nullable|string|max:50',
                'stock' => 'required|numeric',
                'description' => 'required|string|max:500',
                'image' => 'required|',
            ]);
            if ($request->hasFile('image')) {
                $imgName = 'lv_' . rand() . '.' . $request->image->extension();
                $request->image->move(public_path('products/'), $imgName);
            }
            product::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'color' => $request->color,
                'brand_id' => $request->brand_id,
                'product_code' => $request->product_code,
                'gender' => $request->gender,
                'function' => $request->function,
                'stock' => $request->stock,
                'description' => $request->description,
                'image' => $imgName,
            ]);
            return redirect()->route('product.index')->with('success', 'product Created Successfully.');
        }
        catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       


    }
}
