@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Product Size <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Product Size</a></li>
            <li class="active">Create product size</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Create product size</div>
                     </div>
                     <div class="card-title">
                        <a href="{{ route('admin.product.size.index',['product_id'=>$product_id]) }}" class="btn btn-primary">List product size</a>
                    </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{ route('admin.product.size.store',['product_id'=>$product_id]) }}" method="POST">
                      @csrf
                      
                        <div class="sub-title">Sizes</div>
                        <div>
                            <select class="custom-select" name="size_id">
                                <option></option>  
                                @if (!empty($sizes))
                                    @foreach ($sizes as $sizeID => $sizeName )
                                        <option value="{{ $sizeID }}">{{ $sizeName }}</option>
                                    @endforeach    
                                @endif
                               
                              </select>
                        </div>
                        <div class="sub-title">Quantity</div>
                        <div>
                            {{-- <input type="hidden" name="product_id" value="{{ $product_id }}"> --}}
                            <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                        </div><br>
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