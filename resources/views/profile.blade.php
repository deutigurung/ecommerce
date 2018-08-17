@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Profile</div>
                    @include('admin._partials.notification')
                    <div class="container">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 " align="center">
                                                <img alt="User Pic" src="{{ asset(Auth::user()->image) }}" class="img-circle img-responsive">
                                            </div>
                                            <div class=" col-md-9 col-lg-9 ">
                                                <table class="table table-user-information">
                                                    <tbody>
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td>{{  Auth::user()->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email:</td>
                                                        <td>{{  Auth::user()->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Password:</td>
                                                        <td>**********</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td>{{  Auth::user()->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role</td>
                                                        <td>{{  (Auth::user()->role == 1 )? 'Admin' : 'Guest' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phone Number</td>
                                                        <td>{{  Auth::user()->phone }}(Mobile)</td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="{{ route('admin.users.edit',Auth::id()) }}" class="btn btn-primary">Edit</a></td>
                                                        <td><a href="{{ url('/home') }}" class="btn btn-danger">Back</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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
@endsection