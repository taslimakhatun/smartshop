<div class="modal fade" id="view{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Product Info</h5>
                <button href="" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <h5>Product Name</h5>
                    <p>{{$product->product_name}}</p>
                    <hr>
                    <h5>Product Details</h5>
                    <p>{!!$product->product_details!!}</p>
                    <hr>
                    <h5>Product Price & Coupon Price</h5>
                    <p>{{$product->product_price}}Tk - {{$product->coupon_price}}Tk</p>
                    <hr>
                    <h5>Product Size & Color</h5>
                    <p>{{$product->product_size}} - {{$product->product_color}}</p>
                    <hr>
                    <h5>Product Image</h5>
                    <img src="{{asset($product->main_image)}}" width="200">
                    <hr>
                    <h5>Image Gallery</h5>
                    @foreach(json_decode($product->filename) as $img)
                        <img src="{{asset($img)}}" width="100">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
