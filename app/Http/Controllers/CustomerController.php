<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

use App\Models\Image;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function index()
    {
        $products = Product::orderByDesc('created_at')->limit(8)->get();
        return view('customer.index', compact('products'));
    }

    public function shop()
    {
        $products = Product::paginate(15);
        $categories = Category::all();
        return view('customer.shop', compact('products', 'categories'));
    }


    public function show($id)
    {
        $product = Product::with('brand')->where('id', $id)->first();
        $images = Image::where('product_id', $id)->get();
        return view('customer.detail', ['products' => $product, 'images' => $images]);
    }

    public function filter($id)
    {
        $products = Product::where('category_id', $id)->paginate(15);
        $categories = Category::all();
        return view('customer.shop', ['products' => $products,  'categories' => $categories]);
    }
}
