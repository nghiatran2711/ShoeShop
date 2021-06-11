@extends('layouts.master')
@section('content')
    <!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="{{ route('index') }}">Trang chủ</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Đơn đặt hàng của bạn</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
					@include('admin.errors.error')
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- CART TABLE_BLOCK START -->
							<div class="table-responsive">
								<!-- TABLE START -->
								@if(!empty($history_orders))
									<table class="table table-bordered" id="cart-summary">
										<!-- TABLE HEADER START -->
										<thead>
											<tr>
												<th>#</th>
												<th class="cart-product">Mã đơn đặt hàng</th>
												<th class="cart-description">Tình trạng đơn hàng</th>
												<th class="cart-description">Xem chi tiết</th>
												<th class="cart-avail text-center">Thao tác</th>
											</tr>
										</thead>
										<!-- TABLE HEADER END -->
										<!-- TABLE BODY START -->
										<tbody>	
											@foreach ($history_orders as $key =>$value )
											<!-- SINGLE CART_ITEM START -->
												<tr>
													<td>
														{{ $key + 1 }}
													</td>
													<td>
														{{ $value->id}}
													</td>
													<td>
														@if ($value->status==0 || $value->status==1 )
															{{ "Đang chờ xử lý" }}
														@elseif($value->status==2)
															{{ "Đang giao" }}
														@elseif ($value->status==3)
															{{ "Đơn hàng bị huỷ" }}
														@elseif ($value->status==4)
															{{ "Hoàn thành" }}
														@endif
														
													</td>
													<td>
														<a href="{{ route('order_detail',['id'=>$value->id]) }}">Xem chi tiết</a>
													</td>
													<td>
														@if ($value->status==0 || $order->status==1)
															<a href="{{ route('destroy_order',['id'=>$value->id]) }}">Huỷ đơn hàng</a>
														@else
															{{ '' }}
														@endif
													
													</td>
												</tr>
											@endforeach
											<!-- SINGLE CART_ITEM END -->
										</tbody>
										<!-- TABLE BODY END -->							
									</table>
								@else
									<p>Không có lịch sử mua hàng</p>
								@endif
								<!-- TABLE END -->
							</div>
							<!-- CART TABLE_BLOCK END -->
						</div>
					</div>			
				
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
@endsection