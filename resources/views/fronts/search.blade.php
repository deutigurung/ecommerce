@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
    <div class="content">
        <!-- BREADCRUMB -->
        <div id="breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Search</li>
                </ul>
            </div>
        </div>
        <!-- /BREADCRUMB -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                @foreach($searchData as $data)
                    <!--  Product Details -->
                    <div class="product product-details clearfix">
                        <div class="col-md-6">
                            <div id="product-main-view">
                                <div class="product-view">
                                    @if(isset($data->image) && app('files')->exists($data->image))
                                        <img src="{!! asset($data->image) !!}" alt="{{ $data->name }}">
                                    @else
                                        return "No Image found";
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-body">
                                <div class="product-label">
                                    <span>New</span>
                                    @if($data->discount > 0)
                                        <span class="sale">-{{ $data->discount }}%</span>
                                    @endif
                                </div>
                                <h2 class="product-name">{{ $data->name }}</h2>
                                @php
                                    $discount_amt = $data->price - ($data->price * $data->discount)/100 ;
                                @endphp
                                <h3 class="product-price">@php echo $discount_amt; @endphp
                                    @if($data->discount)
                                        <del class="product-old-price">{{ $data->price }}</del>
                                    @endif
                                </h3>
                                <div>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                    <a href="#">3 Review(s) / Add Review</a>
                                </div>
                                <p><strong>Availability:</strong> {{ ($data->status = 1) ? 'Available' : 'Out of Stock' }}</p>
                                <p><strong>Brand:</strong> E-SHOP</p>
                                <p>{!! $data->summary !!}</p>

                                <div class="product-btns">
                                    <div class="qty-input">
                                        <span class="text-uppercase">QTY: </span>
                                        <input class="input" type="number" min="1">
                                    </div>
                                    <a href="javascript:void(0);" class="primary-btn add-to-cart"
                                       onclick="event.preventDefault(); document.getElementById('add_to_cart').submit();"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    <form method="POST" id="add_to_cart" action="{{ route('cart.add_to_cart',$data->id) }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$data->id}}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Details -->
                    </div>
                @endforeach
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
    </div>
@stop
