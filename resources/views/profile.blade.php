@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    @include('admin._partials.notification')
                    <div class="card-body">
                        <hr>
                        <h2>My Orders</h2>
                        @if($orders)
                            @foreach($orders as $key => $order)
                                @if(auth()->user()->id == $order->user_id)
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <ul class="list-group">{{-- @dd($order)--}}
                                            <li class="list-group-item">
                                                <span> Quantity : {{ $order->quantity }} Items</span><br>
                                                <span> Product Id: {{ $order->product_id }} </span><br>
                                                <span> Price NPR: {{  $order->price }}</span><br>
                                                <span> Price NPR: {{  $order->created_at }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-footer">
                                        <strong>Total Price:NPR: {{ $order->total_amount }} </strong>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                           {{-- @foreach($orders as $order)
                                @foreach($order->cart as $item)
                                    {{ $item['qty'] }}
                                @endforeach
                            @endforeach--}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
