@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @include('admin._partials.notification')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br> <br>
                    <a href="{{ route('order') }}" class="btn btn-primary">View Order</a>
                    <a href="{{ route('profile') }}" class="btn btn-success">View Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
