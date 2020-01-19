<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Image;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProductController extends Controller
{
    public function index(){
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();

        return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands' => $brands
        ]);
    }

    protected function productValidate($request){
        $this->validate($request, [
            'product_name' => 'required',
            'product_price' => 'required'
        ]);
    }

    protected function productImageUpload($request){
        $mainImage = $request->file('main_image');
        $imageName = $mainImage->getClientOriginalName();
        $directory = 'public/admin/product-images/main/';
        $imageUrl = $directory.$imageName;
//        $mainImage->move($directory, $imageName);
        Image::make($mainImage)->save($imageUrl);
        return $imageUrl;
    }

    protected function saveProductInfo($request, $imageUrl){
        if($request->hasFile('filename')){
            foreach($request->file('filename') as $image){
                $name = $image->getClientOriginalName();
                $directory = 'public/admin/product-images/gallery/';
                $image->move($directory, $name);
                $data[] = $directory.$name;
            }
        }

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_details = $request->product_details;
        $product->product_price = $request->product_price;
        $product->coupon_price = $request->coupon_price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_color = $request->product_color;
        $product->product_size = $request->product_size;
        $product->main_image = $imageUrl;
        $product->filename = json_encode($data);
        $product->save();
    }

    public function saveProduct(Request $request){
        $this->productValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductInfo($request, $imageUrl);

        return back()->with('message','Product Added Successfully');
    }

    public function viewProduct(){
        $products = DB::table('products')
                            ->join('categories','products.category_id','=','categories.id')
                            ->join('brands','products.brand_id','=','brands.id')
                            ->get();


//        $products = Product::all();
//        return $products;
        return view('admin.product.view-product',['products'=>$products]);
    }
}















