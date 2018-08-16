<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Ecommerce</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{!! asset('front-assets/css/bootstrap.min.css') !!}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{!! asset('front-assets/css/slick.css') !!}" />
    <link type="text/css" rel="stylesheet" href="{!! asset('front-assets/css/slick-theme.css') !!}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{!! asset('front-assets/css/nouislider.min.css') !!}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{!! asset('front-assets/css/font-awesome.min.css') !!}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{!! asset('front-assets/css/style.css') !!}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{!! asset('front-assets/js/jquery.min.js') !!}"></script>

</head>

<body>
<!-- HEADER -->
<header>
    <!-- top Header -->
    <div id="top-header">
        <div class="container">
            <div class="pull-left">
                <span>Welcome to Ecommerce Shop!!</span>
            </div>
            <div class="pull-right">
                <ul class="header-top-links">
                    <strong><li>Date: {{ date('M d,Y') }}</li></strong>
                </ul>
            </div>
        </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
        <div class="container">
            <div class="pull-left">
                <!-- Logo -->
                <div class="header-logo">
                    <a class="logo" href="{{ url('/') }}">
                        <img src="{!! asset('front-assets/images/logo.png') !!}"  alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <!-- Search -->
                <div class="header-search">
                    <form method="get" action="{{ url('search') }}">
                        <input class="input search-input" name="keyword" id="keyword" type="text" placeholder="I'm looking for ">
                        <select class="input search-categories" name="cate_id">
                            <option value="0">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->cate_title }}</option>
                            @endforeach
                        </select>
                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /Search -->
            </div>
            <div class="pull-right">
                <ul class="header-btns">
                    <!-- Account -->
                    <li class="header-account dropdown default-dropdown">
                        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                        </div>
                            @if(auth()->user())
                                <a href="javascript:void(0);"  class="text-uppercase"
                                   onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a>
                                <form id="logout" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="text-uppercase">Login</a>/
                                <a href="{{ route('register') }}" class="text-uppercase">Join</a>
                            @endif
                        <ul class="custom-menu">
                            @if(auth()->user())
                                <li><i class="fa fa-user-o"></i> My Account</li>

                                <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                                <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                               @else
                                <li><a href="{!! route('login') !!}"><i class="fa fa-unlock-alt"></i> Login</a></li>
                                <li><a href="{!! route('register') !!}"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                            @endif
                        </ul>
                    </li>
                    <!-- /Account -->

                    <!-- Cart -->
                    <li class="header-cart dropdown default-dropdown">
                        <a href="{{ route('cart.index') }}" class="dropdown-toggle" aria-expanded="true">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="qty">{{ Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</span>
                            </div>
                            <strong class="text-uppercase">My Cart:</strong>
                            <br>
                            <span>NPR: {{ Session::has('cart') ? Session::get('cart')->totalPrice : 0 }}</span>
                        </a>
                    </li>
                    <!-- /Cart -->

                    <li class="nav-toggle">
                        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                    </li>
                    <!-- / Mobile nav toggle -->
                </ul>
            </div>
        </div>
        <!-- header -->
    </div>
    <!-- container -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav {!! ($current_page == '/') ? '' : 'show-on-click' !!} ">
                <span class="category-header">Categories <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        @foreach($categories as $category)
                            @if($category->subCategories->count() > 0)
                                <li class="dropdown side-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{{ $category->cate_title }}<i class="fa fa-angle-right"></i></a>
                                    <div class="custom-menu">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <ul class="list-links">
                                                    <li><h3 class="list-links-title">{{ $category->cate_title }}</h3></li>
                                                    @foreach($category->subCategories as $subCategory)
                                                        <li><a href="{{ route('front.product',$subCategory->id) }}">{!! $subCategory->cate_title !!}</a></li>
                                                    @endforeach
                                                </ul>
                                                <hr class="hidden-md hidden-lg">
                                            </div>
                                        </div>
                                        <div class="row hidden-sm hidden-xs">
                                            <div class="col-md-12">
                                                <hr>
                                                <a class="banner banner-1" href="#">
                                                    @if(isset($category->image) && app('files')->exists($category->image))
                                                        <img src="{{ asset($category->image)}}" alt="{{ $category->cate_title }}" height="300px">
                                                    @endif
                                                    <div class="banner-caption text-center">
                                                        <h2 class="white-color">{{ $category->cate_title }}</h2>
                                                        <h3 class="white-color font-weak">HOT DEAL</h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    </li>
                                @else
                                <li><a href="{{ route('front.product',$category->id) }}">{{ $category->cate_title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
            </div>
            <!-- /category nav -->

            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                <ul class="menu-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
                        <div class="custom-menu">
                            <div class="row">
                            </div>
                            <div class="row hidden-sm hidden-xs">
                                <div class="col-md-12">
                                    <hr>
                                    <a class="banner banner-1" href="#">
                                        <img src="front-assets/images/banner05.jpg" alt="">
                                        <div class="banner-caption text-center">
                                            <h2 class="white-color">NEW COLLECTION</h2>
                                            <h3 class="white-color font-weak">HOT DEAL</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Men <i class="fa fa-caret-down"></i></a>
                        <div class="custom-menu">
                            <div class="row">
                            </div>
                        </div>
                    </li>
                    <li><a href="#">Sales</a></li>
                    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
                        <ul class="custom-menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="products.html">Products</a></li>
                            <li><a href="product-page.html">Product Details</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->