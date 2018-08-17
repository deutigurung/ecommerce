<?php

namespace App\Http\Controllers\Cart;

use App\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function orderPlacemnt(Request $request){
        if(session()->has('cart')){
            $cart = Session::get('cart');
        }else{
            $cart = Session::get('cart');
        }
        $cart = new Cart($cart);
        $cart_id = str_random(16);
       // dd($cart->items );
        foreach($cart->items as  $item => $cartItem){
            //dd($cartItem['qty']);
            $temp = array();
            $temp['product_id'] = $item;
            $temp['cart_id'] = $cart_id;
            $temp['user_id'] =  Auth::user()->id;
            $temp['quantity'] = $cartItem['qty'];
            $temp['price'] = $cartItem['price'];
            $temp['total_amount'] = $cartItem['price'] * $cartItem['qty'];
            $temp['order_status'] = 1;
            $new = new Order($temp);
            $new->save();
        }
        Session::forget('cart');
        return redirect()->route('home')->with('success','Your order have been placed successfully.');
    }
}
