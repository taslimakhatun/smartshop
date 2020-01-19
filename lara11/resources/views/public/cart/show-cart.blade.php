@extends('public.master')

@section('body')
    <div class="page-head">
        <div class="container">
            <h3>Check Out</h3>
        </div>
    </div>
    <!-- //banner -->
    <!-- check out -->
    <div class="checkout">
        <div class="container">
            <h3>My Shopping Bag</h3>
            <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
                <table class="timetable_sub">
                    <thead>
                    <tr>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    @foreach($cartProducts as $cartProduct)
                    <tr class="rem1">
                        <td class="invert-closeb">
                            <div class="rem">
                                <a href="{{route('delete-cart-item',['rowId'=>$cartProduct->rowId])}}" class="close1"></a>
                            </div>
                        </td>
                        <td class="invert-image"><a href="single.html"><img src="{{asset($cartProduct->options->image)}}" alt=" " class="img-responsive" /></a></td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <form action="{{route('update-cart')}}" method="post">
                                        @csrf
                                        <input name="btn" type="submit" class="entry value-minus" value="-">
                                        <input class="entry value" type="text" name="qty" value="{{$cartProduct->qty}}" min="1">
                                        <input name="btn" type="submit" class="entry value-plus active" value="+">
                                        <input name="rowId" type="hidden" value="{{$cartProduct->rowId}}">
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{$cartProduct->name}}</td>
                        <td class="invert">Tk. {{$cartProduct->price}}</td>
                        <td class="invert">Tk. {{$cartProduct->subtotal}}</td>
                    </tr>
                    @endforeach


                    <!--quantity-->
                    <script>
                        $('.value-plus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                            divUpd.text(newVal);
                        });

                        $('.value-minus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                            if(newVal>=1) divUpd.text(newVal);
                        });
                    </script>
                    <!--quantity-->
                </table>
            </div>
            <div class="checkout-left">

                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a href="{{route('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                </div>
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    @if(Session::get('customerId') && Session::get('shippingId'))
                        <a href="{{url('/checkout/payment')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    @elseif(Session::get('customerId'))
                        <a href="{{url('/checkout/shipping')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    @else
                        <a href="{{url('/checkout')}}"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Checkout</a>
                    @endif
                </div>
                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                    <h4>Shopping basket</h4>
                    <ul>
                        @php($sum = 0)
                        @foreach($cartProducts as $cartProduct)
                        <li>{{$cartProduct->name}} <i>-</i> <span>Tk. {{$subtotal = $cartProduct->subtotal}}</span></li>
                        <?php $sum = $sum+$subtotal ?>
                        @endforeach
                        <li>Tax <i>-</i> <span>Tk. {{$tax = 200}}</span></li>
                        <li>Total <i>-</i> <span>Tk. {{$orderTotal = $sum+$tax}}</span></li>
                        @php(Session::put('orderTotal',$orderTotal))
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection