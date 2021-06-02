@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Create User <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">create user</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Create user</div>
                     </div>
                 </div>
                 @include('admin.errors.error')
                 <div class="panel-body">
                    <form action="{{ route('admin.user.store') }}" method="POST">
                      @csrf
                      <div class="sub-title">Full name</div>
                      <div>
                          <input type="text" name="name" class="form-control" placeholder="Full name">
                      </div>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="sub-title">Email</div>
                      <div>
                          <input type="email" name="email" class="form-control" placeholder="Email">
                      </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="sub-title">Role</div>
                        <div>
                            <select class="custom-select" name="role_id">
                                <option></option>
                                @if (!empty($roles))   
                                    @foreach ($roles as $key => $role )
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                @endif
                              </select>
                        </div>
                        @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      <br>
                      <div>
                          <button type="submit" class="btn btn-default">Store</button>
                      </div>
                    </form>
                 </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection