@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Create Category <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Edit category</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Edit category</div>
                     </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{route('admin.category.update',['id'=>$category->id])}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="sub-title">Category Name</div>
                      <div>
                          <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                      </div>
                      <div class="sub-title">Parent ID</div>
                      <div>
                          <input type="number" name="parent_id" class="form-control" value="{{ $category->parent_id }}">
                      </div><br>
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