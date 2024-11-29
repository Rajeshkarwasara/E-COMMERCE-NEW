<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Brands::all();
        return view('admin.brands_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|min:2|string',
                'address' => 'nullable|string|max:100',
                'img' => 'required|',
            ]);
            if ($request->hasFile('img')) {
                $imgName = 'lv_' . rand() . '.' . $request->img->extension();
                $request->img->move(public_path('imgs/'), $imgName);
            }
            Brands::create([
                'name' => $request->name,
                'description' => $request->address,
                'img' => $imgName,
            ]);
            return redirect()->route('brands.index')->with('success', 'Brand Created Successfully.');

        } catch (\Exception $e) {
            dd($e);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $data=Brands::find($id);
       return view('admin.edit_brand',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $data=Brands::find($id);
        if ($request->hasFile('img')) {
            if ($data->img && \Storage::exists('imgs/' . $data->img)) {
                \Storage::delete('imgs/' . $data->img);
            }


            $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('imgs'), $fileName);
        }
        $data->update(array_merge($request->all(),['img'=>$fileName ?? $data->img]));
        return redirect()->route("brands.index")->with('success', 'brand update successfully!');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $brand = Brands::findOrFail($id);
    
            $brand->status = $brand->status === 'inactive' ? 'active' : 'inactive';
    
            $brand->save();
    
            return redirect()->route('brands.index')->with('success', 'Brand status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('brands.index')->with('error', 'Failed to update brand status.');
        }
    }
    
}
