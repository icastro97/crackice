<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index() {
        $products = Product::paginate(10);
        return view('products.products',['products' => $products]);
    }

    function delete(Request $request) {
        $prod = Product::find($request->id);
        $prod->delete();
        return back();
    }

    function addProduct(Request $request) {
        $prod = new Product();
        $prod->name = $request->name;
        $prod->price = $request->price;
        $imagePath = $request->file('file')->store('products', 'public');
        $prod->image = $imagePath;
        $prod->save();
        
        return back();
    }
}
