@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Price <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Price</a></li>
            <li class="active">Edit price</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Edit price</div>
                     </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{ route('admin.product.price.update',['product_id'=>$product_id,'price_id'=>$price->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="sub-title">Price</div>
                      <div>
                          <input type="text" name="price" class="form-control" value="{{ $price->price }}">
                      </div>
                      {{-- <div class="sub-title">Product</div>
                        <div>
                            <select class="custom-select" name="product_id">
                                <option></option>  
                                @foreach ($products as $productID => $productName )
                                <option value="{{ $productID }}" {{ $productID==$price->product_id ? 'selected' : '' }}>{{ $productName }}</option>
                                @endforeach    
                              </select>
                        </div> --}}
                      <div class="sub-title">Date begin</div>
                      <div>
                          <input type="date" name="begin_date" class="form-control" value="{{ $price->begin_date }}">
                      </div>
                      <div class="sub-title">Date end</div>
                      <div>
                          <input type="date" name="end_date" class="form-control" value="{{ $price->end_date }}">
                      </div>
                      <div class="sub-title">Status</div>
                        <div>
                            <div class="radio3 radio-check radio-inline">
                                <input type="radio" id="radio4" name="status" value="1" {{ $price->status==1 ? 'checked' : '' }}>
                                <label for="radio4">
                                Active
                                </label>
                            </div>
                            <div class="radio3 radio-check radio-success radio-inline">
                                <input type="radio" id="radio5" name="status" value="0" {{ $price->status==0 ? 'checked' : '' }}>
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