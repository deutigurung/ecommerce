@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel panel-default">
                                                @if ($message = Session::get('success'))
                                                    <div class="custom-alerts alert alert-success fade in">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                        {!! $message !!}
                                                    </div>
                                                    <?php Session::forget('success');?>
                                                @endif
                                                @if ($message = Session::get('error'))
                                                    <div class="custom-alerts alert alert-danger fade in">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                        {!! $message !!}
                                                    </div>
                                                    <?php Session::forget('error');?>
                                                @endif
                                                <div class="panel-heading">Paywith Paypal</div>
                                                <div class="panel-body">
                                                    <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!! route('addmoney.paypal') !!}" >
                                                        {{ csrf_field() }}
                                                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                                            <label for="amount" class="col-md-4 control-label">Amount</label>
                                                            <div class="col-md-6">
                                                                <input class="form-control" value="{{ $totalPrice }}">
                                                                @if ($errors->has('amount'))
                                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-6 col-md-offset-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                   Buy Now
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop