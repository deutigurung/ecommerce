@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')

    <div class="content container">
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
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Product Item</h2>
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
    </div>
    <!-- /container -->
    </div>
    <!-- /section -->

    </div>
    @stop