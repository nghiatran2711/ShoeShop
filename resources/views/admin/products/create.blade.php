@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Create Product <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">create product</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Create product</div>
                     </div>
                 </div>
                 <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    {{-- show error message --}}
                    @if(Session::has('error'))
                        <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif

                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="sub-title">Product Name</div>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Product name">
                        </div>
                        <div class="sub-title">Description</div>
                        <div>
                            <textarea class="form-control" rows="3" name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="sub-title">Content</div>
                        <div>
                            <textarea class="form-control" rows="3" name="content" placeholder="Content"></textarea>
                        </div>
                        <div class="sub-title">Thumbnail</div>
                        <div>
                            <input type="file" name="thumbnail" id="exampleInputFile">
                        </div>
                        <div class="sub-title">Image</div>
                        <div>
                            <input type="file" name="url[]" id="exampleInputFile" multiple>
                        </div>
                        <div class="sub-title">Status</div>
                        <div>
                            <div class="radio3 radio-check radio-inline">
                                <input type="radio" id="radio4" name="status" value="1" checked="">
                                <label for="radio4">
                                Active
                                </label>
                            </div>
                            <div class="radio3 radio-check radio-success radio-inline">
                                <input type="radio" id="radio5" name="status" value="0">
                                <label for="radio5">
                                Don't Active
                                </label>
                            </div>
                        </div>
                        <div class="sub-title">Feature</div>
                        <div>
                            <div class="radio3 radio-check radio-inline">
                                <input type="radio" id="radio4" name="is_feature" value="0" checked="">
                                <label for="radio4">
                                    don't feature
                                </label>
                            </div>
                            <div class="radio3 radio-check radio-success radio-inline">
                                <input type="radio" id="radio5" name="is_feature" value="1">
                                <label for="radio5">
                                    Feature
                                </label>
                            </div>
                        </div>
                        <div class="sub-title">Brand</div>
                        <div>
                            <select class="custom-select" name="brand_id">
                                <option></option>
                                @if (!empty($brands))   
                                    @foreach ($brands as $id => $name )
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                @endif
                              </select>
                        </div>
                        <div class="sub-title">Category</div>
                        <div>
                            <select class="custom-select" name="category_id">
                                <option></option>
                                @if (!empty($categories))   
                                    @foreach ($categories as $id => $name )
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                @endif
                              </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Store</button>
                    </form>
                 </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection