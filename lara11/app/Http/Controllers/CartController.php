<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::find($request->id);

        Cart::add([
            'id' => $request->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'qty' => $request->qty,
            'options' => [
                'image' => $product->main_image
            ]
        ]);

        return redirect('/cart/show');
    }

    public function showCart(){
        $cartProducts = Cart::content();
//        return $cartProducts;
        return view('public.cart.show-cart',['cartProducts'=>$cartProducts]);
    }

    public function deleteCart($id){
        Cart::remove($id);
        return back();
    }

    public function updateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
        return back();
    }
}













