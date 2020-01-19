@extends('admin.master')

@section('body')
    <div class="container-fluid">
        @if(Session::get('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h1>Add Product</h1>

        <form action="{{route('new-product')}}" method="post" enctype="multipart/form-data">
           @csrf
            <div class="form-group">
                <label for="categoryname">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="categoryname">
            </div>
            <div class="form-group">
                <label for="product-details">Product Details</label>
                <textarea rows="5"class="form-control" id="editor" name="product_details"></textarea>
            </div>
            <div class="form-group">
                <label for="categoryname">Product Price</label>
                <input type="text" class="form-control" id="categoryname" name="product_price">
            </div>
            <div class="form-group">
                <label for="categoryname">Product Cupon Price</label>
                <input type="text" class="form-control" id="categoryname" name="coupon_price">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">select category </label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    <option>---Select Category---</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->cat_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Brand </label>
                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                    <option>---Select Brand---</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">select Color</label>
                <select class="form-control" id="exampleFormControlSelect1" name="product_color">
                    <option>---Select Color---</option>
                    <option value="red">Red</option>
                    <option value="white">White</option>
                    <option value="black">Black</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">select Size</label>
                <select class="form-control" id="exampleFormControlSelect1" name="product_size">
                    <option>---Select Size---</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>

                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="main_image">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image Gellary</label>

                <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple name="filename[]">
            </div>
            <input type="submit" class="btn btn-primary">
        </form>

    </div>
@endsection