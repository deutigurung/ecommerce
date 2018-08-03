@extends('admin.master')
@section('title') List @stop
@section('content')
    <div class="content right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>List All <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Users</a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                @includeIf('admin._partials.notification')
                <div class="x_content">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count()>0)
                            @php $count = 1; @endphp
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>
                                        @if($user->roles()->exists())
                                            @foreach($user->roles()->get() as $role)
                                                {{ ucfirst($role->name) }}
                                            @endforeach
                                         @endif
                                    </td>
                                    <td style="width: 40%; height: 30%">
                                        @if(isset($user->image) && app('files')->exists($user->image))
                                            <img src="{{ asset($user->image) }}" class="img-responsive center" style="width: 40%; height: 30%"></td>
                                            @else
                                                No Image Found.
                                        @endif
                                    <td>
                                        <a href="{{ route('admin.users.edit',$user->id) }}">Edit</a> /
                                        <a href="javascript:void(0);"
                                           onclick="event.preventDefault(); document.getElementById('delete{{ $count }}').submit();"> Delete</a>
                                        <form method="post" id="delete{{ $count }}" action="{{ route('admin.users.destroy',$user->id) }}">
                                            {{ method_field('delete') }}
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @php $count++ @endphp
                            @endforeach
                            @else
                            <tr><td colspan="7"> No Record Found.</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop