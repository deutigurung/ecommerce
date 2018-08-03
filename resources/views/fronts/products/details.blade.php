@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
    <div class="content">
        <!-- BREADCRUMB -->
        <div id="breadcrumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Products</a></li>
                    @if($product)
                        <li><a href="#">{{ $product->getCategoryProduct($product->cate_id) }}</a></li>
                        <li class="active">{{ $product->name }}</li>
                    @endif
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
                    @if($product)
                        <!--  Product Details -->
                        <div class="product product-details clearfix">
                            <div class="col-md-6">
                                <div id="product-main-view">
                                    <div class="product-view">
                                        @if(isset($product->image) && app('files')->exists($product->image))
                                            <img src="{!! asset($product->image) !!}" alt="{{ $product->name }}">
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
                                        @if($product->discount > 0)
                                            <span class="sale">-{{ $product->discount }}%</span>
                                        @endif
                                    </div>
                                    <h2 class="product-name">{{ $product->name }}</h2>
                                    @php
                                        $discount_amt = $product->price - ($product->price * $product->discount)/100 ;
                                    @endphp
                                    <h3 class="product-price">@php echo $discount_amt; @endphp
                                        @if($product->discount)
                                            <del class="product-old-price">{{ $product->price }}</del>
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
                                    <p><strong>Availability:</strong> {{ ($product->status = 1) ? 'Available' : 'Out of Stock' }}</p>
                                    <p><strong>Brand:</strong> E-SHOP</p>
                                    <p>{!! $product->summary !!}</p>

                                    <div class="product-btns">
                                        <div class="qty-input">
                                            <span class="text-uppercase">QTY: </span>
                                            <input class="input" type="number" min="1">
                                        </div>
                                        <a href="{{ route('cart.add_to_cart',$product->id) }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="product-tab">
                                    <ul class="tab-nav">
                                        <li><a data-toggle="tab" href="#tab1">Details</a></li>
                                        <li><a data-toggle="tab" href="#tab2">Reviews (3)</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab1" class="tab-pane fade in active">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                        <div id="tab2" class="tab-pane fade in">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="product-reviews">
                                                        <div class="single-review">
                                                            <div class="review-heading">
                                                                <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                                <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                                <div class="review-rating pull-right">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o empty"></i>
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                            </div>
                                                        </div>

                                                        <div class="single-review">
                                                            <div class="review-heading">
                                                                <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                                <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                                <div class="review-rating pull-right">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o empty"></i>
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                            </div>
                                                        </div>

                                                        <div class="single-review">
                                                            <div class="review-heading">
                                                                <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                                                <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                                                <div class="review-rating pull-right">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o empty"></i>
                                                                </div>
                                                            </div>
                                                            <div class="review-body">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                                            </div>
                                                        </div>

                                                        <ul class="reviews-pages">
                                                            <li class="active">1</li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h4 class="text-uppercase">Write Your Review</h4>
                                                    <p>Your email address will not be published.</p>
                                                    <form class="review-form">
                                                        <div class="form-group">
                                                            <input class="input" type="text" placeholder="Your Name" />
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="input" type="email" placeholder="Email Address" />
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="input" placeholder="Your review"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-rating">
                                                                <strong class="text-uppercase">Your Rating: </strong>
                                                                <div class="stars">
                                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="primary-btn">Submit</button>
                                                    </form>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /Product Details -->
                     @endif
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
                            <h2 class="title">Picked For You</h2>
                        </div>
                    </div>
                    <!-- section title -->
                    @foreach($other_products as $other_product)
                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <div class="product-label">
                                    <span>New</span>
                                    @if($other_product->discount > 0)
                                        <span class="sale">-{{ $other_product->discount }}%</span>
                                    @endif
                                </div>
                                <a href="{!! route('front.pro_details',$other_product->id) !!}" class="main-btn quick-view">
                                    <i class="fa fa-search-plus"></i> Quick view
                                </a>
                                @if(isset($other_product->image) && app('files')->exists($other_product->image))
                                <img src="{!! asset($other_product->image) !!}" alt="">
                                    @else
                                     return "No Image found";
                                @endif
                            </div>
                            <div class="product-body">
                                @php
                                    $discount_amt = $other_product->price - ($other_product->price * $other_product->discount)/100 ;
                                @endphp
                                <h3 class="product-price">NPR: @php echo $discount_amt; @endphp
                                    @if($other_product->discount)
                                        <del class="product-old-price">
                                            {!! $other_product->price !!}
                                        </del> @endif
                                </h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="{{ route('front.pro_details',$other_product->id) }}">{{ $other_product->name }}</a></h2>
                                <div class="product-btns">
                                    <a href="{{ route('cart.add_to_cart',$other_product->id) }}" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->
                    @endforeach
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
    </div>
    @stop