<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null; //initalization whole cart items
    public $totalQty = 0; // initalization total cart quantity
    public $totalPrice = 0; // initalization total cart price

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function addCart($item, $id){
        $storedItem = ['qty'=>0,'price'=> $item->price, 'item'=>$item];
        //dd($storedItem);
        if($this->items){ //already exists item in cart
            if(array_key_exists($id,$this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        if($item->discount){
            $price = $item->price - $item->price * $item->discount /100;
            $item->price = $price;
        }else{
            $item->price = $item->price;
        }
        $storedItem['price'] =  $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

}
