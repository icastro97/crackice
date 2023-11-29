<?php

namespace App\Http\Controllers;

use App\Models\Shop\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function getAllProducts() {
        $productos = Product::all();

        return response()->json($productos);
    }
}
