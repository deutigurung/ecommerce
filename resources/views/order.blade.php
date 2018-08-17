@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('admin._partials.notification')
                    <div class="card-body">
                        <h2>My Orders</h2>
                        <hr>
                        @if(isset($orders))
                            @foreach($orders as $key => $order)
                                @if(Auth::id() == $order->user_id)
                                    <div class="jumbotron" style="background-color: #FFFFFF; border:1px #000000 solid;">
                                        @foreach($products as $product)
                                            @if($product->id == $order->product_id)
                                                <div class="panel-body">
                                                    @foreach($products as $product)
                                                        @if($product->id == $order->product_id)
                                                            <img src="{{ asset($product->image) }}">

                                                            <ul class="list-group">
                                                                <li class="list-unstyled pull-right">
                                                                    <span> Product Name:</span> <strong>{{ $product->name }}</strong></br>
                                                                    @if($product->discount >0)
                                                                        <span>Discount :</span> <strong>{{ $product->discount }}%</strong><br>
                                                                    @endif
                                                                    <span> Quantity :</span> <strong>{{ $order->quantity }}</strong> Items<br>
                                                                    <span> Price:</span> NPR <strong>{{  $order->price }}</strong><br>
                                                                    <span> Order Date:</span> <strong>{{  $order->created_at->format('d M,y') }}</strong>
                                                                    <br>
                                                                    <strong>Total Price:NPR {{ $order->total_amount }} </strong>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p>'Sorry !! You have not any order. Please order something!!'</p>
                            <a href="{{ url('/') }}" class="btn btn-success">Shopping</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection