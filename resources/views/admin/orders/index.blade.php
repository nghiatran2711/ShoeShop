@extends('admin.layouts.master')
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            List Orders <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Order</a></li>
            <li class="active">List order</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">List order</div>
                     </div>
                 </div>
                 {{-- show message --}}
                 @include('admin.errors.error')
                 <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tình trạng đơn hàng</th>
                                    <th>Xem chi tiết</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order )
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        @if ($order->status==0 || $order->status==1 )
                                            {{ "Đang chờ xử lý" }}
                                        @elseif($order->status==2)
                                            {{ "Đang giao" }}
                                        @elseif ($order->status==3)
                                            {{ "Đơn hàng bị huỷ" }}
                                        @elseif ($order->status==4)
                                            {{ "Hoàn thành" }}
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.order.order_detail',['id'=>$order->id]) }}">Xem chi tiết</a></td>
                                    <td>
                                        @if ($order->status==0 || $order->status==1 )
                                            <a href="{{ route('admin.order.confirm_order',['id'=>$order->id]) }}" class="btn btn-success">Duyệt</a><br>
                                        @endif
                                        <br>
                                        <a href="" class="btn btn-danger">Huỷ đơn hàng</a>
                                    </td>
                                </tr> 
                                @endforeach
                                       
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