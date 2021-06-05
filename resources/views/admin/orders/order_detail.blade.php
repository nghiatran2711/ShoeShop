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
                         <div class="title">Thông tin khách hàng</div>
                     </div>
                 </div>
                 
                 <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Họ và tên</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
         </div>
     </div>
     <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="card-title">
                        <div class="title">Chi tiết đơn hàng</div>
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
                                   $total_quantity=0;
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
                                           @php
                                               $subtotal_quantity=$order_detail->quantity;
                                           @endphp
                                       </td>
                                   </tr> 
                                   @php
                                        $total+=$subtotal; 
                                        $total_quantity+=$subtotal_quantity;      
                                    @endphp
                                   @endforeach
                               @endif

                               <tr>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td colspan="2">
                                       Tổng số lượng: <span>{{ $total_quantity }}</span><br>
                                       Tổng tiền: <span>{{ number_format($total).' '. 'VNĐ' }}</span>
                                   </td>
                               </tr>
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