@extends('public.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-lg-8">
                <h1 class="text-center">Dear {{Session::get('customerName')}}<br>Please provide your shipping info.</h1>
                <small class="text-danger">If Shipping Info is different please edit the form</small>
                <form action="{{route('new-shipping')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input type="text" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email Address:</label>
                        <input type="text" name="email_address" class="form-control" value="{{$customer->email_address}}">
                    </div>
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <input type="text" name="phone_no" class="form-control" value="{{$customer->phone_no}}">
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" name="address" class="form-control" value="{{$customer->address}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn" class="btn btn-warning btn-lg">Save Shipping Info</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
