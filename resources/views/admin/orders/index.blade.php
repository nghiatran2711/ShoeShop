@extends('admin.layouts.master')
@push('css')
	<style type="text/css">
		.my-active span{
			background-color: #0283fc !important;
			color: white !important;
			border-color: #0283fc !important;
		}
	</style>
@endpush
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
                        <div class="row">
                            <div class="col-md-3">
                                <div class="title">List Orders</div>
                            </div>
                            <div class="col-md-9">
                                <form class="navbar-form" role="search" action="{{ route('admin.order.search') }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-5"> 
                                             <p>Date</p>
                                        </div> 
                                        <div class="col-md-4">
                                             <p>Pendding</p>
                                        </div>
                                        <div class="col-md-3">
                                          
                                       </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <input type="date" class="form-control" name="date" value="{{ !empty($date) ? $date : '' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" name="status">
                                                <option value=""></option>
                                                <option value="0-1" {{ !empty($status) && $status=='0-1' ? 'selected' : '' }}>Đang chờ duyệt</option>
                                                <option value="2" {{ !empty($status) && $status=="2" ? 'selected' : '' }}>Đang giao</option>
                                                <option value="3" {{ !empty($status) && $status=="3" ? 'selected' : '' }}>Bị huỷ bỏ</option>
                                                <option value="4" {{ !empty($status) && $status=="4" ? 'selected' : '' }}>Đã giao</option>
                                              </select>
                                        </div>
                                        <div class="col-md-3">    
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"> Search</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                <div class="text-center">
                    {{ $orders->appends(request()->input())->links('vendor.pagination.custom') }}
                </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection