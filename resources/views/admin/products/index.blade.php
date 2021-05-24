@extends('admin.layouts.master')
@push('css')
    <style type="text/css">
        .my-active span{
            background-color: #0283fc !important;
            color: white !important;
            border-color: #0283fc !important;
        }
    </style>
@endpush
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            List Product <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">list product</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="title">List products</div>
                            </div>
                            <div class="col-md-6">
                                  <form class="navbar-form" role="search" action="{{ route('admin.product.search') }}" method="GET">
                                    <label for="">Category: </label>
                                    <select class="selectpicker" name="category_id">  
                                        <option value=""></option>
                                        @if (!empty($categories))   
                                        @foreach ($categories as $category )
                                            <option value="" disabled style="font-weight:bold;">{{ $category->name }}</option>
                                            @foreach ($category->childs as $child )
                                                <option value="{{ $child->id }}">--{{ $child->name }}</option>
                                            @endforeach
                                        @endforeach
                                    @endif
                                      </select> 
                                    <div class="input-group" >
                                        <input type="text" class="form-control" placeholder="Enter product name" name="keyword">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                 </div>
                 <div class="panel-body">
                    @if(Session::has('success'))
                        <p class="text-success">{{ Session::get('success') }}</p>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product name</th>
                                    <th>Thumbnail</th>
                                    <th>Status</th>
                                    <th colspan="5">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($products))
                                    @foreach ($products as $key =>$product )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><img src="{{ asset($product->thumbnail) }}" alt="" width="100"></td>
                                        <td>{{ $product->status }}</td>
                                        {{-- <td class="center"><a href="{{ route('admin.product.price.index',['product_id'=>$product->id]) }}" class="btn btn-primary">Price product Manage</a></td>
                                        <td class="center"><a href="{{ route('admin.product.promotion.index',['product_id'=>$product->id]) }}" class="btn btn-primary">Promotion product Manage</a></td> --}}
                                        <td class="center">
                                            <a href="{{ route('admin.product.size.index',['product_id'=>$product->id]) }}" class="btn btn-primary">Size Manage</a><br><br>
                                            <a href="{{ route('admin.product.price.index',['product_id'=>$product->id]) }}" class="btn btn-primary">Price Manage</a><br><br>
                                            <a href="{{ route('admin.product.promotion.index',['product_id'=>$product->id]) }}" class="btn btn-primary">Promotion Manage</a>
                                        </td>
                                        <td class="center"><a href="" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a></td>
                                        <td class="center"><a href="{{ route('admin.product.edit',['id'=>$product->id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                                        <td class="center">
                                            <form action="{{ route('admin.product.destroy',['id'=>$product->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this product?');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach 
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center">
                    {{ $products->appends(request()->input())->links('vendor.pagination.custom') }}
                </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection