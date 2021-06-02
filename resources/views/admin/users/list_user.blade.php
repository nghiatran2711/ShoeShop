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
            List Users <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Users</a></li>
            <li class="active">List users</li>
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
                                    <div class="title">List users</div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <form class="navbar-form" role="search" action="{{ route('admin.brand.search') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter brands" name="keyword">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> --}}
                            </div>
                            <div class="card-title">
                                <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Create user</a>
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
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created_at</th>
                                            <th>Status</th>
                                            <th colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($users))
                                                @foreach ($users as $key =>$user )
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    
                                                    <td>
                                                        @if ($user->role_id==2)
                                                            {{ "Nhân viên giao hàng" }}
                                                        @endif    
                                                    </td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td>
                                                        @if ($user->status==1)
                                                            {{ "Active" }}
                                                        @else
                                                            {{ "Not active" }}
                                                        @endif
                                                    </td>
                                                    
                                                    @if ($user->status==0)
                                                        <td class="center"><a href="{{ route('admin.user.active_user',['id'=>$user->id]) }}" onclick="return confirm('Are you sure you want to active this user?');" class="btn btn-success">Active</a></td>
                                                    @else
                                                        <td class="center"><a href="{{ route('admin.user.de_active_user',['id'=>$user->id]) }}" onclick="return confirm('Are you sure you want to de-active this user?');" class="btn btn-warning">De Active</a></td>
                                                    @endif
                                                    <td class="center"><a href="{{ route('admin.user.reset_password',['id'=>$user->id]) }}" onclick="return confirm('Are you sure you want to reset password this user?');" class="btn btn-info">Reset Password</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table> 
                            </div>  
                        </div>
                    </div>
                    <div class="text-center">
                        {{ $users->appends(request()->input())->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection