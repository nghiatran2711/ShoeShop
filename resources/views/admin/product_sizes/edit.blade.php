@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Product Size <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Product Size</a></li>
            <li class="active">Edit product size</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Edit product size</div>
                     </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{ route('admin.product.size.update',['product_id'=>$product_size->pivot->product_id,'size_id'=>$product_size->pivot->size_id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="sub-title">Sizes</div>
                        <div>
                            <select class="custom-select" name="size_id">
                                <option></option>  
                                @foreach ($sizes as $sizeID => $sizeName )
                                    <option value="{{ $sizeID }}" {{ $sizeID==$product_size->id ? 'selected' : 'null' }}>{{ $sizeName }}</option>
                                @endforeach    
                              </select>
                        </div>
                        <div class="sub-title">Quantity</div>
                        <div>
                            {{-- <input type="hidden" name="product_id" value="{{ $product_id }}"> --}}
                            <input type="number" name="quantity" class="form-control" value="{{ $product_size->pivot->quantity }}">
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