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
            List Category <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">list category</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="title">List categories</div>
                            </div>
                            <div class="col-md-3">
                                <form class="navbar-form" role="search" action="{{ route('admin.category.search') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter category name" name="keyword">
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category ID</th>
                                    <th>Category name</th>
                                    <th>Parent ID</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key =>$category )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->parent_id }}</td>
                                        <td class="center"><a href="" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a></td>
                                        <td class="center"><a href="{{ route('admin.category.edit',['id'=>$category->id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                                        <td class="center">
                                            <form action="{{ route('admin.category.destroy',['id'=>$category->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this category?');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <div class="text-center">
                    {{ $categories->appends(request()->input())->links('vendor.pagination.custom') }}
                </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection