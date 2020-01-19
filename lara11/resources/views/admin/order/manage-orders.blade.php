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

        <h1>View Orders</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Order Total</th>
                <th scope="col">Order Status</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 1)
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
                    <td>{{$order->order_total}}</td>
                    <td>{{$order->order_status}}</td>
                    <td>{{$order->payment->payment_type}}</td>
                    <td>{{$order->payment->payment_status}}</td>
                    <td><!-- Button trigger modal -->
                        <a href="{{route('order-detail',['id'=>$order->id])}}" type="button" class="btn btn-info">
                            <i class="fas fa-search-plus"></i>
                        </a>
                        <a href="{{route('view-order-invoice',['id'=>$order->id])}}" type="button" class="btn btn-warning">
                            <i class="fas fa-vector-square"></i>
                        </a>
                        <a href="" type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" type="button" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                        <!-- Modal -->
                    </td>
                </tr>

{{--                <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                    <div class="modal-dialog" role="document">--}}
{{--                        <div class="modal-content">--}}
{{--                            <div class="modal-header">--}}
{{--                                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>--}}
{{--                                <button href="" type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                    <span aria-hidden="true">&times;</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="modal-body">--}}
{{--                                <form action="{{route('update-category')}}" method="post" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Category Name</label>--}}
{{--                                        <input type="text" name="cat_name" class="form-control" value="{{$category->cat_name}}">--}}
{{--                                        <input type="hidden" name="id" class="form-control" value="{{$category->id}}">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Category Description</label>--}}
{{--                                        <textarea class="form-control" name="cat_desc">{{$category->cat_desc}}</textarea>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="exampleFormControlFile1">Image</label>--}}
{{--                                        <h5>Previus Image</h5>--}}
{{--                                        <img src="{{asset($category->cat_image)}}" alt="" width="200px" height="200px" >--}}
{{--                                        <br><br>--}}
{{--                                        <input type="file" name="cat_image" class="form-control-file" id="exampleFormControlFile1">--}}
{{--                                    </div>--}}
{{--                                    <input type="submit" name="btn" class="btn btn-primary" value="Update">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            @endforeach
            </tbody>
        </table>
    </div>




@endsection