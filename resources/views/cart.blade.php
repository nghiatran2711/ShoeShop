@extends('layouts.master')
@section('content')
    <!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">HOMe</a>
							<span><i class="fa fa-caret-right	"></i></span>
							<span>Your shopping cart</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPPING-CART SUMMARY START -->
						<h2 class="page-title">Shopping-cart summary <span class="shop-pro-item">Your shopping cart contains: {{ Cart::content()->count() }} products</span></h2>
						<!-- SHOPPING-CART SUMMARY END -->
					</div>	
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						{{-- <div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-current first">
									<span>01. Summary</span>
								</li>
								<li class="step-todo second">
									<span>02. Sign in</span>
								</li>
								<li class="step-todo third">
									<span>03. Address</span>
								</li>
								<li class="step-todo four">
									<span>04. Shipping</span>
								</li>
								<li class="step-todo last" id="step_end">
									<span>05. Payment</span>
								</li>
							</ul>									
						</div> --}}
						<!-- SHOPING-CART-MENU END -->
						<!-- CART TABLE_BLOCK START -->
						<div class="table-responsive">
							<!-- TABLE START -->
							<table class="table table-bordered" id="cart-summary">
								<!-- TABLE HEADER START -->
								<thead>
									<tr>
										<th class="cart-product">Hình ảnh</th>
										<th class="cart-description">Tên sản phẩm</th>
										<th class="cart-avail text-center">Kích cỡ</th>
										<th class="cart-unit text-right">Giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart-delete">&nbsp;</th>
										<th class="cart-total text-right">Thành tiền</th>
									</tr>
								</thead>
								<!-- TABLE HEADER END -->
								<!-- TABLE BODY START -->
								<tbody>	
									<!-- SINGLE CART_ITEM START -->
									@if (Cart::content())
										@foreach (Cart::content() as $row )
											<tr>
												<td class="cart-product">
													<a href="#"><img alt="Blouse" src="{{ asset($row->options->has('thumbnail') ? $row->options->thumbnail : '') }}"></a>
												</td>
												<td class="cart-description">
													<p class="product-name"><a href="#">{{ $row->name }}</a></p>
												</td>
												<td class="cart-description">
													<p class="product-name"><a href="#">Size: {{ $row->options->has('size') ? $row->options->size : '' }}</a></p>
												</td>
												<td class="cart-unit">
													<ul class="price text-right">
														<li class="price">{{ number_format($row->price).' '.'VNĐ' }}</li>
													</ul>
												</td>
												<td class="cart_quantity text-center">
													<form action="{{ route('update_cart') }}" method="GET">
														@csrf
														<input type="hidden" name="rowId" value="{{ $row->rowId }}">
														<div class="cart-plus-minus-button">														
															<input class="cart-plus-minus" type="text" name="quantity" value="{{ $row->qty }}">	
														</div>
														<button type="submit" class="btn btn-danger">Câp nhật</button>
													</form>
												</td>
												<td class="cart-delete text-center">
													<span>
														<a href="{{ route('remove_item_cart',['id'=>$row->rowId]) }}" class="cart_quantity_delete" title="Delete"><i class="fa fa-trash-o"></i></a>
													</span>
												</td>
												<td class="cart-total">
													<span class="price">{{ number_format($row->price * $row->qty).' '.'VNĐ' }}</span>
												</td>
											</tr>
										@endforeach
									@endif
									<!-- SINGLE CART_ITEM END -->
								</tbody>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>										
									{{-- <tr class="cart-total-price">
										<td class="cart_voucher" colspan="3" rowspan="4"></td>
										<td class="text-right" colspan="3">Total products (tax excl.)</td>
										<td id="total_product" class="price" colspan="1"></td>
									</tr>  --}}
									{{-- <tr>
										<td class="text-right" colspan="3">Total shipping</td>
										<td id="total_shipping" class="price" colspan="1">$5.00</td>
									</tr> --}}
									{{-- <tr>
										<td class="text-right" colspan="3">Total vouchers (tax excl.)</td>
										<td class="price" colspan="1">$0.00</td>
									</tr> --}}
									<tr>
										<td class="cart_voucher" colspan="3" rowspan="4"></td>
										<td class="total-price-container text-right" colspan="3">
											<span>Tổng tiền</span>
										</td>
										<td id="total-price-container" class="price" colspan="1">
											<span id="total-price">{{ Cart::pricetotal(0).' '. "VNĐ" }}</span>
										</td>
									</tr>
								</tfoot>		
								<!-- TABLE FOOTER END -->									
							</table>
							<!-- TABLE END -->
						</div>
						<!-- CART TABLE_BLOCK END -->
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="{{ route('index') }}" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
							<button type="button" class="procedtocheckout" data-toggle="modal" data-target="#modal-send-code">Tiến hành thanh toán<i class="fa fa-chevron-right"></i></button>

						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->						
					</div>
				</div>
			</div>
		</section>
		@include('carts.parts.modal_send_code')

		{{-- @push('css')
			<link rel="stylesheet" href="{{ asset('css/carts/cart-info.css') }}">
		@endpush --}}

		@push('js')
			{{-- <script>
				const URL_CHECKOUT = "{{ route('cart.checkout') }}";
			</script> --}}
			<script src="{{ asset('frontend/js/carts/cart-info.js') }}"></script>
		@endpush
		<!-- MAIN-CONTENT-SECTION END -->
@endsection