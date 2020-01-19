<?php

namespace App\Http\Controllers;

use App\Brand;
use Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.add-brand');
    }

    public function newBrand(Request $request){
        $this->validate($request, [
            'brand_name' => 'required|min:3|max:10|regex:/^[A-Za-z ,.-]+$/',
            'brand_description' => 'required',
            'brand_image' => 'required|image',
            'status' => 'required',
        ]);

        $brandImage = $request->file('brand_image');
        $ext = '.'.$request->brand_image->getClientOriginalExtension();
        $imageName = str_replace($ext,date('d-m-Y').$ext,$request->brand_image->getClientOriginalName());
        $directory = 'public/admin/brand-images/';
        $imageUrl = $directory.$imageName;
//        $brandImage->move($directory, $imageName);
        Image::make($brandImage)->resize(300,300)->save($imageUrl);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->brand_image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();

        return redirect('/brand')->with('message','Brand Added Successfully');
    }

    public function viewBrand(){
        $brands = Brand::all();
        return view('admin.brand.view-brand',['brands'=>$brands]);
    }
}














