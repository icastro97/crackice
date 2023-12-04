<?php

namespace App\Http\Controllers;

use App\Models\Shop\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class CartController extends Controller
{
    public function add(Request $request){

        $producto = Product::find($request->producto_id);
        $codigo = Session::get('codigo_ingresado');

        FacadesCart::add($producto->id, $producto->name, 1, $producto->price,['image' => $producto->image]);
        Session::put('cart_updated_at', now());

        return "success";

    }

    public function cart(){

        return view('checkout');
    }

    public function removeitem(Request $request) {
        FacadesCart::remove($request->id);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        FacadesCart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }


    function pay() {
        return view('pay');
    }
}
