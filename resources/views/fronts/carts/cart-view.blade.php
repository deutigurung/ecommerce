@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
    <div class="content">

        <!-- BREADCRUMB -->
        <div id="breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
        <!-- /BREADCRUMB -->

        <div class="section ">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="order-summary clearfix">
                            <div class="section-title">
                                <h3 class="title">Cart</h3>
                            </div>
                            <table class="shopping-cart-table table">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th></th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($cartItem)
                                    @foreach($cartItem as $item)
                                        <tr>
                                            <td class="thumb"><img src="{{ $item['item']->image }}" alt=""></td>
                                            <td class="details">{{ $item['item']->id }}
                                                <a href="#">{{ $item['item']->name }}</a><br>
                                            </td>
                                            <td class="price text-center">
                                                <strong>NPR. {{ $item['item']->price }}</strong><br/>
                                            </td>
                                            <td class="qty text-center center">
                                                <input type="number" name="qty" class="input" value="{!! $item['qty'] !!}">
                                          </td>
                                            <td class="total text-center">
                                                <strong class="primary-color">NPR. {!! $item['price'] !!}</strong>
                                            </td>
                                            <td class="text-right">
                                                <a class="main-btn icon-btn"><i class="fa fa-close"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr colspan="6"> No cart found!!</tr>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="empty" colspan="3"></th>
                                    <th>TOTAL</th>
                                    <th colspan="2" class="total">NPR. {{ $totalPrice }}</th>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="pull-left">
                                <a href="{{ url('/') }}" class="primary-btn">Continue Shopping</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('cart.checkout') }}" class="primary-btn">Place Order</a>
                                @csrf
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop