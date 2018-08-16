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
            return redirect()->route('front.home');
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

    public function cartUpdate(Request $request,$id)
    {

        $qty = $request->input('qty');
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->updateCart($product,$product->id,$qty);
        //dd($cart);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function destroyCart($id){
        //dd(session()->get('cart'));
        session()->forget('cart', $id);
        return redirect()->back();
    }

    public function clearCart(){
        session()->forget('cart');
        return redirect()->route('front.home');
    }
}
