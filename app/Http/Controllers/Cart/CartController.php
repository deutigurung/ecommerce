<?php

namespace App\Http\Controllers\Cart;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart()
    {
        $product_id = request()->get('product_id');
        $product = Product::find($product_id);
        $cart = Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1,
            'price' => $product->price,
            'options' => ['image' => $product->image]));
        //dd($cart);
        return view('fronts.carts.cart-view', array('cart' => $cart));
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

    public function checkoutCart(Request $request)
    {
          //dd($request->all());
        if(!Session::has('cart')){
            return view('front.home'); //to get item
        }
        $oldCart = session()->get('cart');
        $cart = new Cart($oldCart);
        $totalAmt = $cart->totalPrice;
        return view('fronts.carts.checkout',['total'=>$totalAmt]);
    }

    public function destroyCartProduct($id)
    {
        //$id = session()->get('cart');
        $cartProduct = session()->get('cart')->$items->id;
        dd($cartProduct);
        $cartProduct->delete();
        return view('fronts.carts.cart-view');
    }
}
