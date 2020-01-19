@extends('admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Info for this Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name</th>
                                <td>{{$order->customer->first_name}} {{$order->customer->last_name}}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{$order->customer->phone_no}}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{{$order->customer->email_address}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$order->customer->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Info for this Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td>{{$order->shipping->full_name}}</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>{{$order->shipping->phone_no}}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>{{$order->shipping->email_address}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$order->shipping->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payment Info for this Order</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Payment Type</th>
                                    <td>{{$order->payment->payment_type}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>{{$order->payment->payment_status}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Info for this Order</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sl.</th>
                                    <th>Product Id</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                @php($i = 1)
                                @foreach($orderDetails as $orderdetail)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$orderdetail->product_id}}</td>
                                    <td>{{$orderdetail->product_name}}</td>
                                    <td>{{$orderdetail->product_price}}</td>
                                    <td>{{$orderdetail->product_quantity}}</td>
                                    <td>{{$orderdetail->product_price * $orderdetail->product_quantity}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Whole Details Info for this Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order No</th>
                                <td>{{$order->id}}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{$order->order_total}}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>{{$order->order_status}}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{$order->created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

@endsection
