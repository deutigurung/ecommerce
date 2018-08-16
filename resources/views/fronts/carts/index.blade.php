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
                                            <td class="thumb"><img src="{{ $item->options->image }}" alt=""></td>
                                            <td class="details">
                                                <a href="#">{{ $item->name }}</a><br>
                                            </td>
                                            <td class="price text-center">
                                                <strong>NPR. {{ $item->price }}</strong><br/>
                                            </td>
                                            <td class="qty text-center center">
                                                <form method="get" action="{{ route('cart.cartUpdate',$item->rowId) }}">
                                                    <input type="number" name="qty" class="input" value="{!! $item->qty !!}">
                                                    <button type="submit">ok</button>
                                                </form>
                                            </td>
                                            <td class="total text-center">
                                                <strong class="primary-color">NPR. {!! $item->subtotal !!}</strong>
                                            </td>
                                            <td class="text-right">
                                                <a href="javascript:void(0);" class="main-btn icon-btn"
                                                   onclick="event.preventDefault();document.getElementById('delete_cartItem').submit();"><i class="fa fa-close"></i></a>
                                                <form method="post" id="delete_cartItem" action="{{ route('cart.deleteCart',$item->rowId) }}">
                                                    {{ method_field('delete') }}
                                                    @csrf
                                                </form>
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
                                    <th colspan="2" class="total">NPR. {{ Cart::subtotal() }}</th>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="pull-left">
                                <a href="{{ url('/') }}" class="primary-btn">Continue Shopping</a>
                                <a href="{{ route('cart.clearCart') }}" class="primary-btn">Clear Cart</a>
                            </div>
                            <div class="pull-right">
                                {{--<form class="form-horizontal" method="POST" action="{!! {{ route('orderStore') }} !!}">
                                    @csrf
                                    @includeif('admin.banners.banner-form')
                                </form>--}}
                                <a href="{{ route('cart.checkout') }}" class="primary-btn">Place Order</a>
                                @csrf
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
    <script type="text/javascript">
        function changeValue(total_id,unit_price,elem,old_price){
            var qty = $(elem).val();
            var total_price = unit_price * qty;
            $('#'+total_id).html(+total_price);
            var sub_total = $('.total').data(total);
            console.log(sub_total);
        }
        </script>
    --}}
@stop
$order_id = DB::getPdo()->lastInsertId();
foreach ($cart as $data) {
$total_price = $data['price'] * $data['qty'];
$qty = $data['qty'];
$OrderPro = new OrderProduct();
$OrderPro->order_id = $order_id;
$OrderPro->product_id = $data['product_id'];
$OrderPro->total = $data['product_price'];
$OrderPro->qty = $data['product_quantity'];
$OrderPro->save();
}