<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name as brand_name')
            ->get();
        return view('admin.product_list', compact('brand'));
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
                $imageName = 'lv_' . rand() . '.' . $request->image->extension();
                $request->image->move(public_path('products/'), $imageName);
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
                'image' => $imageName,
            ]);
            return redirect()->route('product.index')->with('success', 'product Created Successfully.');
        } catch (\Exception $e) {
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
    public function edit($id)
    {

        $data = DB::table('products')
            ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name as brand_name')
            ->where('products.id', $id)
            ->first();
        return view("admin.edit_product", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = product::find($id);
        if ($request->hasFile('image')) {
            if ($data->image && \Storage::exists('images/' . $data->image)) {
                \Storage::delete('images/' . $data->image);
            }


            $imageName = 'lv_' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('products/'), $imageName);
        }
        $data->update(array_merge($request->all(), ['image' => $imageName ?? $data->image]));
        return redirect()->route("product.index")->with('success', 'brand update successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $product = product::findOrFail($id);

            $product->status = $product->status === 'inactive' ? 'active' : 'inactive';

            $product->save();

            return redirect()->route('product.index')->with('success', 'Brand status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('product.index')->with('error', 'Failed to update brand status.');
        }
    }
}
