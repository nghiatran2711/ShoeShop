@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Create Category <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">create category</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Create category</div>
                     </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{ route('admin.category.store') }}" method="POST">
                      @csrf
                      <div class="sub-title">Category Name</div>
                      <div>
                          <input type="text" name="name" class="form-control" placeholder="Category name">
                      </div>
                      <div class="sub-title">Parent ID</div>
                        <div>
                            <select class="custom-select" name="parent_id">
                                <option></option>
                                @if (!empty($parent_category))   
                                    @foreach ($parent_category as $id => $name )
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                @endif
                              </select>
                        </div>
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