@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            List Product Size <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Product size</a></li>
            <li class="active">List product size</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">List Promotion detail</div>
                     </div>
                     <div class="card-title">
                        <a href="{{ route('admin.promotion_detail.create') }}" class="btn btn-primary">Create Promotion detail</a>
                    </div>
                 </div>
                 
                 <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Discount</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($product_promotions))
                                    @foreach ($product_promotions as $key =>$product_promotion )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            {{-- <td>{{ $price->id }}</td> --}}
                                            @php
                                                $product_name=DB::table('products')->where('id','=',$product_promotion->product_id)->first();
                                                $discount=DB::table('promotions')->where('id','=',$product_promotion->promotion_id)->first();
                                            @endphp
                                            <td>{{ $product_name->name }}</td>
                                            <td>{{ $discount->discount }} %</td>
                                            <td class="center"><a href="" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a></td>
                                            {{-- <td class="center"><a href="{{ route('admin.product.size.edit',['product_id'=>$product_id,'size_id'=>$product_size->pivot->size_id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                                            <td class="center">
                                                <form action="{{ route('admin.product.size.destroy',['product_id'=>$product_id,'size_id'=>$product_size->pivot->size_id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this Product size?');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection