@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Create Size <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Size</a></li>
            <li class="active">Edit size</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Edit size</div>
                     </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{route('admin.size.update',['id'=>$size->id])}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="sub-title">Size Name</div>
                      <div>
                          <input type="number" name="name" class="form-control" value="{{ $size->name }}">
                      </div><br>
                      <div>
                          <button type="submit" class="btn btn-default">Update</button>
                      </div>
                    </form>
                 </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection