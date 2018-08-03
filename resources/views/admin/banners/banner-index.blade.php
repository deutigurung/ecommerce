@extends('admin.master')
@section('title') List Banner @stop
@section('content')
    <div class="content right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Admin Panel</h3>
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
                    <h2>All Banner <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('admin.banner.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Banner</a>
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
                            <th>Banner Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Thumbnails</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($banners->count()>0)
                            @php $count = 1; @endphp
                            @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $banner->banner_name }}</td>
                                    <td>{{ $banner->description }}</td>
                                    <td>{{ $banner->status() }}</td>
                                    <td style="width: 40%; height: 30%">
                                        @if(isset($banner->banner_image) && app('files')->exists($banner->banner_image))
                                            <img src="{{ asset($banner->banner_image) }}" class="img-responsive center" style="width: 40%; height: 30%"></td>
                                        @else
                                            No Image Found.
                                        @endif
                                    <td>
                                        <a href="{{ route('admin.banner.edit',$banner->id) }}">Edit</a> /
                                        <a href="javascript:void(0);"
                                           onclick="event.preventDefault(); document.getElementById('delete-banner{{ $count }}').submit();"> Delete</a>
                                        <form method="post" id="delete-banner{{ $count }}" action="{{ route('admin.banner.destroy',$banner->id) }}">
                                            {{ method_field('delete') }}
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @php $count++ @endphp
                            @endforeach
                        @else
                            <tr><td colspan="6"> No Record Found.</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop