<?php

namespace App\Http\Controllers\Cart;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addCart($product,$product->id);

        $request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('front.home');
    }

    public function getCart()
    {
        if(!Session::has('cart')){
            return view('front.home'); //to get item
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart); // add cart with old one
        return view('fronts.carts.cart-view',['cart_product'=> $cart->items,'totalPrice'=>$cart->totalPrice]);
    }
}
