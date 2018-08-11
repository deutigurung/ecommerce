@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
    <div class="content">
        <!-- BREADCRUMB -->
        <div id="breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Products</li>
                </ul>
            </div>
        </div>
        <!-- /BREADCRUMB -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Shop by:</h3>
                            <ul class="filter-list">
                                <li><span class="text-uppercase">color:</span></li>
                                <li><a href="#" style="color:#FFF; background-color:#8A2454;">Camelot</a></li>
                                <li><a href="#" style="color:#FFF; background-color:#475984;">East Bay</a></li>
                                <li><a href="#" style="color:#FFF; background-color:#BF6989;">Tapestry</a></li>
                                <li><a href="#" style="color:#FFF; background-color:#9A54D8;">Medium Purple</a></li>
                            </ul>

                            <ul class="filter-list">
                                <li><span class="text-uppercase">Size:</span></li>
                                <li><a href="#">X</a></li>
                                <li><a href="#">XL</a></li>
                            </ul>

                            <ul class="filter-list">
                                <li><span class="text-uppercase">Price:</span></li>
                                <li><a href="#">MIN: $20.00</a></li>
                                <li><a href="#">MAX: $120.00</a></li>
                            </ul>

                            <ul class="filter-list">
                                <li><span class="text-uppercase">Gender:</span></li>
                                <li><a href="#">Men</a></li>
                            </ul>

                            <button class="primary-btn">Clear All</button>
                        </div>
                        <!-- /aside widget -->

                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Filter by Price</h3>
                            <div id="price-slider"></div>
                        </div>
                        <!-- aside widget -->

                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Filter By Color:</h3>
                            <ul class="color-option">
                                <li><a href="#" style="background-color:#475984;"></a></li>
                                <li><a href="#" style="background-color:#8A2454;"></a></li>
                                <li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
                                <li><a href="#" style="background-color:#9A54D8;"></a></li>
                                <li><a href="#" style="background-color:#675F52;"></a></li>
                                <li><a href="#" style="background-color:#050505;"></a></li>
                                <li><a href="#" style="background-color:#D5B47B;"></a></li>
                            </ul>
                        </div>
                        <!-- /aside widget -->

                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Filter By Size:</h3>
                            <ul class="size-option">
                                <li class="active"><a href="#">S</a></li>
                                <li class="active"><a href="#">XL</a></li>
                                <li><a href="#">SL</a></li>
                            </ul>
                        </div>
                        <!-- /aside widget -->

                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Filter by Brand</h3>
                            <ul class="list-links">
                                <li><a href="#">Nike</a></li>
                                <li><a href="#">Adidas</a></li>
                                <li><a href="#">Polo</a></li>
                                <li><a href="#">Lacost</a></li>
                            </ul>
                        </div>
                        <!-- /aside widget -->

                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Filter by Gender</h3>
                            <ul class="list-links">
                                <li class="active"><a href="#">Men</a></li>
                                <li><a href="#">Women</a></li>
                            </ul>
                        </div>
                        <!-- /aside widget -->

                        <!-- aside widget -->
                        <div class="aside">
                            <h3 class="aside-title">Top Rated Product</h3>
                            <!-- widget product -->
                            <div class="product product-widget">
                                <div class="product-thumb">
                                    <img src="#" alt="">
                                </div>
                                <div class="product-body">
                                    <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                    <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /widget product -->

                            <!-- widget product -->
                            <div class="product product-widget">
                                <div class="product-thumb">
                                    <img src="front-assets/images/thumb-product01.jpg" alt="">
                                </div>
                                <div class="product-body">
                                    <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                    <h3 class="product-price">$32.50</h3>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /widget product -->
                        </div>
                        <!-- /aside widget -->
                    </div>
                    <!-- /ASIDE -->

                    <!-- MAIN -->
                    <div id="main" class="col-md-9">
                        <!-- store top filter -->
                        <div class="store-filter clearfix">
                            <div class="pull-left">
                                <div class="row-filter">
                                    <a href="#"><i class="fa fa-th-large"></i></a>
                                    <a href="#" class="active"><i class="fa fa-bars"></i></a>
                                </div>
                                <div class="sort-filter">
                                    <span class="text-uppercase">Sort By:</span>
                                    <select class="input">
                                        <option value="0">Position</option>
                                        <option value="0">Price</option>
                                        <option value="0">Rating</option>
                                    </select>
                                    <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="page-filter">
                                    <span class="text-uppercase">Show:</span>
                                    <select class="input">
                                        <option value="0">10</option>
                                        <option value="1">20</option>
                                        <option value="2">30</option>
                                    </select>
                                </div>
                                <ul class="store-pages">
                                    <li><span class="text-uppercase">Page:</span></li>
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /store top filter -->

                        <!-- STORE -->
                        <div id="store">
                            <!-- row -->
                            <div class="row">
                                @if($product_category)
                                    @foreach($product_category as $product)
                                    <!-- Product Single -->
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <div class="product product-single">
                                            <div class="product-thumb">
                                                <div class="product-label">
                                                    <span>New</span>
                                                    @if($product->discount > 0)
                                                        <span class="sale">-{{ $product->discount }}%</span>
                                                    @endif
                                                </div>
                                                <a href="{!! route('front.pro_details',$product->id) !!}" class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</a>
                                                <img src="{!! asset($product->image) !!}" alt="">
                                            </div>
                                            <div class="product-body">
                                                @php
                                                    $discount_amt = $product->price - ($product->price * $product->discount)/100 ;
                                                @endphp
                                                <h3 class="product-price">NPR: @php echo $discount_amt; @endphp
                                                    @if($product->discount)
                                                        <del class="product-old-price">
                                                            {!! $product->price !!}
                                                        </del> @endif
                                                </h3>

                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o empty"></i>
                                                </div>
                                                <h2 class="product-name">{!! $product->name !!}</h2>
                                                <div class="product-btns">
                                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                                    <a href="javascript:void(0);" class="primary-btn add-to-cart"
                                                       onclick="event.preventDefault(); document.getElementById('add_to_cart').submit();"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                                    <form method="POST" id="add_to_cart" action="{{ route('cart.add_to_cart',$product->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Product Single -->
                                    @endforeach
                                    @else
                                        <p>No product found!!</p>
                                @endif
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /STORE -->

                        <!-- store bottom filter -->
                        <div class="store-filter clearfix">
                            <div class="pull-left">
                                <div class="row-filter">
                                    <a href="#"><i class="fa fa-th-large"></i></a>
                                    <a href="#" class="active"><i class="fa fa-bars"></i></a>
                                </div>
                                <div class="sort-filter">
                                    <span class="text-uppercase">Sort By:</span>
                                    <select class="input">
                                        <option value="0">Position</option>
                                        <option value="0">Price</option>
                                        <option value="0">Rating</option>
                                    </select>
                                    <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="page-filter">
                                    <span class="text-uppercase">Show:</span>
                                    <select class="input">
                                        <option value="0">10</option>
                                        <option value="1">20</option>
                                        <option value="2">30</option>
                                    </select>
                                </div>
                                <ul class="store-pages">
                                    <li><span class="text-uppercase">Page:</span></li>
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /store bottom filter -->
                    </div>
                    <!-- /MAIN -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

    </div>
    @stop