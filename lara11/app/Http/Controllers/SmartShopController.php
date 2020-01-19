<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class SmartShopController extends Controller
{
    public function index(){
        $products = Product::orderBy('id','DESC')->skip(4)->take(4)->get();
        $specialProducts = Product::all()->random(4);
        return view('public.home.home',[
            'products' => $products,
            'specialProducts' => $specialProducts
        ]);
    }

    public function category($id){
        $categoryProducts = Product::where('category_id',$id)->get();
        return view('public.category.category',[
            'categoryProducts' => $categoryProducts
        ]);
    }
    public function productDetails($id){
        $productDetail = Product::find($id);
        return view('public.product.product-details',[
            'productDetail' => $productDetail
        ]);
    }
}










