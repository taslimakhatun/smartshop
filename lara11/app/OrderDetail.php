<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function orders(){
        return $this->hasMany(Order::class,'order_id');
    }
}
