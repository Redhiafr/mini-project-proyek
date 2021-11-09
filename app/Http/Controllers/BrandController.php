<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brand.index', ['brand' => Brand::index()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required'
        ]);
        
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
            
            Brand::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image_name,
            ]);
        }

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        Alert::toast('Brand baru berhasil dibuat.', 'success');
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name'=>'required'
        ]);

        $brand = Brand::findOrFail($brand->id);

        if($request->file('image') == "") {

            $brand->update([
                'name'=>$request->name,
                'description'=>$request->description
            ]);

        } else {

            if ($brand->image&&file_exists(storage_path('app/public/'.$brand->image))) {
                \Storage::delete('public/'.$brand->image);
            }

        $image = $request->file('image');
        $image->storeAs('public/', $image->hashName());

        $brand->update([
            'name'     => $request->name,
            'description'   => $request->description,
            'image'     => $image->hashName()
        ]);

    }
        Alert::toast('Brand berhasil diedit.', 'success');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand)
    {
        $post = Brand::find($brand);
        $post->delete();

        Alert::toast('Brand berhasil dihapus.', 'success');
        return redirect()->back();
    }

}
