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
            List Customers <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Customers</a></li>
            <li class="active">List customers</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="title">List Customers</div>
                                </div>
                                <div class="col-md-9">
                                    <form class="navbar-form" role="search" action="{{ route('admin.customer.search') }}" method="GET">
                                        <div class="row">
                                            <div class="col-md-5"> 
                                                 <p>Date</p>
                                            </div> 
                                            <div class="col-md-4">
                                                 <p>Customer name</p>
                                            </div>
                                            <div class="col-md-3">
                                              
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="date" class="form-control" name="date" value="{{ !empty($date) ? $date : '' }}">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="name" value="{{ !empty($name) ? $name : '' }}">
                                            </div>
                                            <div class="col-md-3">    
                                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"> Search</i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="panel-body">
                        @include('admin.errors.error')
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Created_at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($customers))
                                                @foreach ($customers as $key =>$customer )
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $customer->name }}</td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td>{{ $customer->address }}</td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>{{ $customer->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table> 
                            </div>  
                        </div>
                    </div>
                    <div class="text-center">
                        {{ $customers->appends(request()->input())->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection