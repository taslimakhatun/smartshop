<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function payment(){
        return $this->belongsTo(Payment::class,'id');
    }
    public function shipping(){
        return $this->belongsTo(Shipping::class);
    }
    public function orderDetail(){
        return $this->belongsTo(OrderDetail::class,'id');
    }
}
