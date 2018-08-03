@extends('admin.master')
@section('title') List Product @stop
@section('content')
    <div class="content right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Products</h3>
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
                    <h2>All Products <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('admin.product.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add Product</a>
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
                            <th>Product Name</th>
                            <th>Summary</th>
                            <th>Status</th>
                            <th>Price</th>
                            <th>Parent Category</th>
                            <th>Child Category</th>
                            <th>Thumbnails</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($products->count()>0)
                            @php $count = 1; @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->summary }}</td>
                                    <td>{{ isset($product->status) == 1 ? 'Available' : 'Unavailable' }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->cate_id }}</td>
                                    <td>{{ $product->child_cate_id }}</td>
                                    <td style="width: 40%; height: 30%">
                                        @if(isset($product->image) && app('files')->exists($product->image))
                                            <img src="{{ asset($product->image) }}" class="img-responsive center" style="width: 40%; height: 30%"></td>
                                    @else
                                        No Image Found.
                                    @endif
                                    <td>
                                        <a href="{{ route('admin.product.edit',$product->id) }}">Edit</a> /
                                        <a href="javascript:void(0);"
                                           onclick="event.preventDefault(); document.getElementById('delete-product{{ $count }}').submit();"> Delete</a>
                                        <form method="post" id="delete-product{{ $count }}" action="{{ route('admin.product.destroy',$product->id) }}">
                                            {{ method_field('delete') }}
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @php $count++ @endphp
                            @endforeach
                        @else
                            <tr><td colspan="9"> No Record Found.</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop