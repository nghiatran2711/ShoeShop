@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            List promotion <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">promotion</a></li>
            <li class="active">list promotion</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">List promotion</div>
                     </div>
                     <div class="card-title">
                        <a href="{{ route('admin.product.promotion.create',['product_id'=>$product->id]) }}" class="btn btn-primary">Create price of product {{ $product->name }}</a>
                    </div>
                 </div>
                 <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>Promotion ID</th> --}}
                                    <th>Discount</th>
                                    <th>Product ID</th>
                                    <th>Begin date</th>
                                    <th>End date</th>
                                    <th>Status</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($promotions))
                                    @foreach ($promotions as $key =>$promotion )
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            {{-- <td>{{ $promotion->id }}</td> --}}
                                            <td>{{ $promotion->discount }}</td>
                                            <td>{{ $promotion->product_id }}</td>
                                            <td>{{ $promotion->begin_date }}</td>
                                            <td>{{ $promotion->end_date }}</td>
                                            <td>{{ $promotion->status }}</td>
                                            <td class="center"><a href="" class="btn btn-primary"><i class="fa fa-info" aria-hidden="true"></i></a></td>
                                            <td class="center"><a href="{{ route('admin.product.promotion.edit',['product_id'=>$product->id,'promotion_id'=>$promotion->id]) }}" class="btn btn-primary"><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                                            <td class="center">
                                                <form action="{{ route('admin.product.promotion.destroy',['product_id'=>$product->id,'promotion_id'=>$promotion->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this promotion?');"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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