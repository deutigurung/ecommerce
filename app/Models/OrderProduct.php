<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_product';
    
    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
