<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', ['product' => Product::index(), 'image' => Image::index()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $image = Image::all();
        return view('product.create', compact('category','brand','image'));
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
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
            'image_path' => 'required',
        ]);
        
        $product = new Product;
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');

        $category = new Category;
        $category->id = $request->get('category_id');

        $brand = new Brand;
        $brand->id = $request->get('brand_id');

        $product->category()->associate($category);
        $product->brand()->associate($brand);
        
        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $product->save();

        for ($i = 0; $i < count($request->image_path); $i++) {
            $image = new Image();

            if ($request->file('image_path')[$i]) {
                $image_name = $request->file('image_path')[$i]->store('images', 'public');
                
                Image::create([
                    'image_path' => $image_name,
                    'product_id' => $product->id
                ]);
            }

            $image->product()->associate($product);
        }

        Alert::toast('Produk baru berhasil dibuat.', 'success');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = Image::where('product_id', $product->id)->get();
        return view('product.detail', compact('product', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        $brand = Brand::all();
        $images = Image::where('product_id', $product->id)->get();
        return view('product.edit', compact('product', 'category', 'brand','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::toast($validator->messages()->all()[0], 'error');
            return redirect()->back()->withInput();
        }

        $product = Product::findOrFail($product->id);
        $category = new Category;
        $brand = new Brand;

        $product->update([    
            'name'     => $request->name,
            'description' => $request->description,
            'stock'   => $request->stock,
            'price'   => $request->price,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id
        ]);

        $product->category()->associate($category);
        $product->brand()->associate($brand);

        if ($request->file('image_path')) {
            for ($i = 0; $i < 4; $i++) {
                if (array_key_exists($i, $request->file('image_path'))) {
                    if (array_key_exists($i, $request->image_old)) {
                        if ($request->image_old[$i] && file_exists(storage_path('app/public/'.$request->image_old[$i]))) {
                            \Storage::delete('public/'.$request->image_old[$i]);
                        }
                        $image_name = $request->file('image_path')[$i]->store('images', 'public');
                        Image::where('image_path', $request->image_old[$i])->update([
                            'image_path' => $image_name,
                        ]);
                    } else {
                        $image_name = $request->file('image_path')[$i]->store('images', 'public');
                        
                        Image::create([
                            'image_path' => $image_name,
                            'product_id' => $product->id
                        ]);
                    }
                }
            }
        }
        
        Alert::toast('Produk berhasil diupdate.', 'success');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->image()->delete();
        $product->delete();
        Alert::toast('Product berhasil dihapus.', 'success');
        return redirect()->back();
    }
    
}
