@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Reset password user <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">Reset password user</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Reset password user</div>
                     </div>
                 </div>
                 @include('admin.errors.error')
                 <div class="panel-body">
                    <form action="{{route('admin.user.update_password',['id'=>$user->id])}}" method="POST">
                      @csrf
                        <div class="sub-title">User name</div>
                        <div>
                          <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="sub-title">Password</div>
                        <div>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="sub-title">Confirm Password</div>
                        <div>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                 </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection