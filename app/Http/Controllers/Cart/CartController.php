<?php

namespace App\Http\Controllers\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Validator;
use Illuminate\Support\Facades\URL;
use Redirect;
use Input;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
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

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return redirect()->route('front.home');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;
        return view('fronts.carts.payment',['totalPrice'=>$totalPrice]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('front.home');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
       $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        try {
            Charge::create(array(
                "amount" => $cart->totalPrice,
                "currency" => "NPR",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully purchased products!');
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
