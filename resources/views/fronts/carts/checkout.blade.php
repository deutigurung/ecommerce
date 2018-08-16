@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
<div class="content">
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
    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <form id="checkout-form" method="post" action="{{ route('cart.store') }}" class="form-horizontal">
                    @csrf
                    <div class="billing-details">

                        <div class="row">
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="name">Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" value="{{ auth()->user()->name }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="email" value="{{ auth()->user()->email }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">Address <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="address_zip" value="{{ auth()->user()->address }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">Card Holder Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="card-name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">Card Number <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="card-number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">Expiration Month <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="card-expiry-month" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">Expiration Year <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="card-expiry-year" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="">CVC <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" id="card-cvc" class="form-control" required>
                                    </div>
                                </div>
                                @csrf
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Buy Now </button>
                                    </div>
                                </div>
                            </div>

                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@stop
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection