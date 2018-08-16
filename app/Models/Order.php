<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['cart_id','user_id','product_id','price','quantity','total_amount','order_status'];
    protected $guarded = ['created_at','updated_at'];

    public function orderItems(){
        return $this->belongsToMany(Product::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
