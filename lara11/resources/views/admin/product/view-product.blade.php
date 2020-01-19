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

        <h1>View Product</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 1)
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->product_price}}</td>
                    <td><img src="{{asset($product->main_image)}}" alt="" class="img-fluid img-thumbnail" width="100px" ></td>
                    <td>{{$product->cat_name}}</td>
                    <td>{{$product->brand_name}}</td>
                    <td><!-- Button trigger modal -->
                        <a href="" type="button" class="btn btn-info" data-toggle="modal" data-target="#view{{$product->id}}">
                            <i class="fas fa-search-plus"></i>
                        </a>
                        <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$product->id}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('delete-category',['id'=>$product->id])}}" type="button" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                        <!-- Modal -->
                    </td>
                </tr>
                @include('admin.product.includes.view')

            @endforeach
            </tbody>
        </table>
    </div>




@endsection

