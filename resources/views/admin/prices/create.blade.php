@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Price <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Price</a></li>
            <li class="active">create price</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Create price</div>
                     </div>
                     <div class="card-title">
                        <a href="{{ route('admin.product.price.index',['product_id'=>$product_id]) }}" class="btn btn-primary">List Price</a>
                    </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{ route('admin.product.price.store',['product_id'=>$product_id]) }}" method="POST">
                      @csrf
                      <div class="sub-title">Price</div>
                      <div>
                          {{-- <input type="hidden" name="product_id" value="{{ $product_id }}"> --}}
                          <input type="text" name="price" class="form-control" placeholder="Price">
                      </div>
                      {{-- <div class="sub-title">Product</div>
                        <div>
                            <select class="custom-select" name="product_id">
                                <option></option>  
                                @foreach ($products as $productID => $productName )
                                <option value="{{ $productID }}">{{ $productName }}</option>
                                @endforeach    
                              </select>
                        </div> --}}
                      <div class="sub-title">Date begin</div>
                      <div>
                          <input type="date" name="begin_date" class="form-control" placeholder="Begin date">
                      </div>
                      <div class="sub-title">Date end</div>
                      <div>
                          <input type="date" name="end_date" class="form-control" placeholder="End date">
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