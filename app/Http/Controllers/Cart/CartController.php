<?php

namespace App\Http\Controllers\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function getCart(){
        if (!Session::has('cart')) {
            return route('front.home');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('fronts.carts.cart-view',['cartItem' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function AddToCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addCart($product, $product->id);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function cartUpdate(Request $request,$id){
        Cart::update($id,$request->qty);
        return back();
    }

    public function destroyCart($id){
        Cart::remove($id);
        return back();
    }

    public function clearCart(){
        request()->session()->flush();
        return route('front.home');
    }
}
