@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')

    <div class="content">
        <!-- HOME -->
        <div id="home">
            <!-- container -->
            <div class="container">
                <!-- home wrap -->
                <div class="home-wrap">
                    <!-- home slick -->
                    <div id="home-slick" >
                       @if($banners->count() > 0)
                            @foreach($banners as $banner)
                                <!-- banner -->
                                    <div class="banner banner-1">
                                        <img src="{!! asset($banner->banner_image) !!}" alt="">
                                        <div class="banner-caption text-center">
                                            <h1>{!! $banner->banner_name !!}</h1>
                                            <button class="primary-btn">Shop Now</button>
                                        </div>
                                    </div>
                                    <!-- /banner -->
                            @endforeach
                        @endif
                    </div>
                    <!-- /home slick -->
                </div>
                <!-- /home wrap -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOME -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- banner -->
                    <div class="col-md-4 col-sm-6">
                        <a class="banner banner-1" href="#">
                            <img src="front-assets/images/banner10.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h2 class="white-color">NEW COLLECTION</h2>
                            </div>
                        </a>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="col-md-4 col-sm-6">
                        <a class="banner banner-1" href="#">
                            <img src="front-assets/images/banner11.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h2 class="white-color">NEW COLLECTION</h2>
                            </div>
                        </a>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                        <a class="banner banner-1" href="#">
                            <img src="front-assets/images/banner12.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h2 class="white-color">NEW COLLECTION</h2>
                            </div>
                        </a>
                    </div>
                    <!-- /banner -->

                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section-title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Deals Of The Day</h2>
                            <div class="pull-right">
                                <div class="product-slick-dots-1 custom-dots"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /section-title -->

                    <!-- banner -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="banner banner-2">
                            <img src="front-assets/images/banner14.jpg" alt="">
                            <div class="banner-caption">
                                <h2 class="white-color">NEW<br>COLLECTION</h2>
                                <button class="primary-btn">Shop Now</button>
                            </div>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- Product Slick -->
                    <div class="col-md-9 col-sm-6 col-xs-6">
                        <div class="row">
                            <div id="product-slick-1" class="product-slick">
                                <!-- Product Single -->
                                @if($products)
                                    @php $counter = 1; @endphp
                                    @foreach($products as $product)
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
                                                        <ul class="product-countdown">
                                                            <li><span>00 H</span></li>
                                                            <li><span>00 M</span></li>
                                                            <li><span>00 S</span></li>
                                                        </ul>
                                                        <form method="post" action="">
                                                            @csrf
                                                        </form>
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
                                                        <h2 class="product-name"><a href="{{ route('front.pro_details',$product->id) }}">{!! $product->name !!}</a></h2>
                                                        {{--<div class="product-btns">
                                                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                                            <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('add_to_cart').submit();"
                                                               class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                                            <form method="POST" id="add_to_cart" action="{{ route('cart.addCart',$product->id) }}">
                                                                @csrf
                                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                            </form>
                                                        </div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Product Single -->
                                            @if($counter%4 == 0)
                                                <div class="clearfix"></div>
                                            @endif
                                        @endforeach
                                        @php $counter++; @endphp
                                    @endif
                                </div>
                                <!-- /Product Single -->
                            </div>
                        </div>
                    </div>
                    <!-- /Product Slick -->
                </div>
                <!-- /row -->

            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- section -->
        <div class="section section-grey">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- banner -->
                    <div class="col-md-8">
                        <div class="banner banner-1">
                            <img src="front-assets/images/banner13.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                                <button class="primary-btn">Shop Now</button>
                            </div>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="col-md-4 col-sm-6">
                        <a class="banner banner-1" href="#">
                            <img src="front-assets/images/banner11.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h2 class="white-color">NEW COLLECTION</h2>
                            </div>
                        </a>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="col-md-4 col-sm-6">
                        <a class="banner banner-1" href="#">
                            <img src="front-assets/images/banner12.jpg" alt="">
                            <div class="banner-caption text-center">
                                <h2 class="white-color">NEW COLLECTION</h2>
                            </div>
                        </a>
                    </div>
                    <!-- /banner -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->

        <!-- section -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Latest Product</h2>
                        </div>
                    </div>
                    <!-- section title -->
                @if($products)
                    @php $counter = 1; @endphp
                    @foreach($products as $product)
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
                                        <form method="post" action="">
                                            @csrf
                                        </form>
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
                                        <h2 class="product-name"><a href="{{ route('front.pro_details',$product->id) }}">{!! $product->name !!}</a></h2>
                                        {{--<div class="product-btns">
                                            <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                            <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                            <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('add_to_cart').submit();"
                                               class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                            <form method="POST" id="add_to_cart" action="{{ route('cart.addCart',$product->id) }}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                            </form>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                            @if($counter%4 == 0)
                                <div class="clearfix"></div>
                            @endif
                        @endforeach
                        @php $counter++; @endphp
                    @endif
                </div>
                <!-- /row -->

                <!-- row -->
                <div class="row">
                    <!-- section title -->
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">Picked For You</h2>
                        </div>
                    </div>
                    <!-- section title -->

                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img src="front-assets/images/product04.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">$32.50</h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->

                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>New</span>
                                </div>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img src="front-assets/images/product03.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">$32.50</h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->

                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span class="sale">-20%</span>
                                </div>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img src="front-assets/images/product02.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->

                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>New</span>
                                    <span class="sale">-20%</span>
                                </div>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <img src="front-assets/images/product01.jpg" alt="">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
    </div>
    @stop