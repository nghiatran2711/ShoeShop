@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            List Price <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Price</a></li>
            <li class="active">List price</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">List price</div>
                     </div>
                     <div class="card-title">
                        <a href="{{ route('admin.product.price.create',['product_id'=>$product->id]) }}" class="btn btn-primary">Create price of product {{ $product->name }}</a>
                    </div>
                 </div>
                 
                 <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Price</th>
                                    <th>Product ID</th>
                                    <th>Begin date</th>
                                    <th>End date</th>
                                    <th>Status</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($prices))
                                    @foreach ($prices as $key =>$price )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            {{-- <td>{{ $price->id }}</td> --}}
                                            <td>{{ $price->price }}</td>
                                            <td>{{ $price->product_id }}</td>
                                            <td>{{ $price->begin_date }}</td>
                                            <td>{{ $price->end_date }}</td>
                                            <td>{{ $price->status }}</td>
                                            <td class="center"><a href="" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a></td>
                                            <td class="center"><a href="{{ route('admin.product.price.edit',['product_id'=>$product->id,'price_id'=>$price->id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                                            <td class="center">
                                                <form action="{{ route('admin.product.price.destroy',['product_id'=>$product->id,'price_id'=>$price->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this price?');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
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