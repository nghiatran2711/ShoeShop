@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Order detail <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">Order detail</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Order detail code {{ $order_id }}</div>
                     </div>
                 </div>
                 
                 <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Kích cỡ</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                @endphp
                                @if (!empty($order_details))
                                    @foreach ($order_details as $key =>$order_detail )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset($order_detail->thumbnail) }}" width="70" height="70" alt=""></td>
                                        <td>{{ $order_detail->product_name }}</td>
                                        <td>Size: {{ $order_detail->size_name }}</td>
                                        <td>
                                                @if ($order_detail->discount==Null)
                                                     <p class="price">{{ number_format($order_detail->price).' '.'VNĐ' }}</p>
                                                @else
                                                    @php
                                                        $price_discount=$order_detail->discount * $order_detail->price/100;
                                                        $price_new=$order_detail->price-$price_discount;
                                                    @endphp
                                                    <p class="price" style="color: red">{{ number_format($price_new).' '.'VNĐ' }}</p>
                                                    <del class="old-price">{{ number_format($order_detail->price).' '.'VNĐ' }}</del>
                                                @endif
                                        </td>
                                        <td>{{ $order_detail->quantity }}</td>
                                        <td>
                                            @if ($order_detail->discount=='')
                                            @php
                                                $subtotal=$order_detail->price* $order_detail->quantity;
                                            @endphp
                                                <span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span>
                                            @else
                                                @php
                                                    $subtotal=$price_new * $order_detail->quantity;
                                                @endphp
                                                <span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span>
                                            @endif
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