@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
    <div class="">
        <div class="section content">
         <!-- BREADCRUMB -->
         <div id="breadcrumb">
             <div class="container">
                 <ul class="breadcrumb">
                     <li><a href="#">Home</a></li>
                     <li class="active">Checkout</li>
                 </ul>
             </div>
         </div>
         <!-- /BREADCRUMB -->
         <!-- container -->
         <div class="container">
             <!-- row -->
             <div class="row">
                <div class="col-md-12 ">
                     <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Cart Review</h3>
                        </div>
                        <table class="shopping-cart-table table">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($cart_product)
                                @foreach($cart_product as $cart)
                                    <tr>
                                    <td class="thumb"><img src="{!! asset($cart['item']['image']) !!}" alt=""></td>
                                    <td class="details">
                                        <a href="#">{{ $cart['item']['name'] }}</a>
                                    </td>
                                    <td class="price text-center"><strong>{{ $cart['item']['price'] }}</strong><br><del class="font-weak"><small>$40.00</small></del></td>
                                    <td class="qty text-center"><input class="input" type="number" value="{{ $cart['qty'] }}"></td>
                                    <td class="total text-center"><strong class="primary-color">$ {!! $cart['qty'] !!}</strong></td>
                                    <td class="text-right"><button class="main-btn icon-btn"><i class="fa fa-close"></i></button></td>
                                </tr>
                                @endforeach
                                @else
                                <tr colspan="6"> No cart found!!</tr>
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>SUBTOTAL</th>
                                <th colspan="2" class="sub-total">$97.50</th>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>SHIPING</th>
                                <td colspan="2">Free Shipping</td>
                            </tr>
                            <tr>
                                <th class="empty" colspan="3"></th>
                                <th>TOTAL</th>
                                <th colspan="2" class="total">$97.50</th>
                            </tr>
                            </tfoot>
                        </table>
                        <div class="pull-right">
                            <button class="primary-btn">Place Order</button>
                        </div>
                    </div>

                </div>
             </div>
         </div>
    </div>
    </div>
    @stop