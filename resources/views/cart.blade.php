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
										{{-- <th class="cart-avail text-center">Giảm giá</th> --}}
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
									@php
										$total=0;
									@endphp
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
												{{-- <td class="cart-unit">
													<ul class="price text-right">
														<li class="price">{{ $row->options->has('discount') ? $row->options->discount . ' %' : '' }}</li>
													</ul>
												</td> --}}
												<td class="cart-unit">
													<ul class="price text-right">
														@if ($row->options->discount==0)
															<li class="price">{{ number_format($row->price).' '.'VNĐ' }}</li>
														@else
															@php
																$price_discount=$row->options->discount * $row->price/100;
																$price_new=$row->price-$price_discount;
															@endphp
															<li class="price" style="color: red">{{ number_format($price_new).' '.'VNĐ' }}</li>
															<li class="old-price">{{ number_format($row->price).' '.'VNĐ' }}</li>
														@endif
														
													</ul>
												</td>
												<td class="cart_quantity text-center">
														{{-- <input type="hidden" name="rowId" value="{{ $row->rowId }}"> --}}														
															<input class="cart-plus-minus" type="number" id="quantity" data-id="{{ $row->rowId }}" onchange="updateCart()" name="quantity" value="{{ $row->qty }}">	
															{{-- <input class="cart-plus-minus" type="number" id="quantity" data-id="{{ $row->rowId }}" onchange="updateCart()"  name="quantity" value="{{ $row->qty }}">	 --}}
														{{-- <button type="submit" class="btn btn-danger">Câp nhật</button> --}}
												</td>
												<td class="cart-delete text-center">
													<span>
														<a href="{{ route('remove_item_cart',['id'=>$row->rowId]) }}" class="cart_quantity_delete" title="Delete"><i class="fa fa-trash-o"></i></a>
													</span>
												</td>
												<td class="cart-total">
													@if ($row->options->discount==0)
														@php
															$subtotal=$row->price* $row->qty;
														@endphp
														<span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span>
													@else
														@php
															$subtotal=$price_new * $row->qty;
														@endphp
														<span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span>
													@endif
													
												</td>
											</tr>
											@php
												$total+=$subtotal;
											@endphp
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
											{{-- <span id="total-price">{{ Cart::pricetotal(0).' '. "VNĐ" }}</span> --}}
											
											<span id="total-price">{{ number_format($total) . " VNĐ" }}</span>
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
			<script>
				const URL_CHECKOUT = "{{ route('checkout') }}";
			</script>
			<script src="{{ asset('frontend/js/carts/cart-info.js') }}"></script>
			<script type="text/javascript">
				function updateCart(){
						$(document).ready(function () {
							$("input[name='quantity']").each(function() {
								rowId=$(this).data('id');
								quantity=$(this).val();
								console.log( rowId + quantity );
								$.ajax({
									type: "GET",
									url: '{{ url('update-cart') }}',
									dataType: 'json',
									data: {rowId:rowId,quantity:quantity},
									success: function (response) {
										window.location.reload();
										console.log('response', response);
										// alert(response.message);
										// console.log(response);
									},
									error: function (err) {
										console.log(err)
									},
								});
							});
							window.location.reload();
						});
					}       
			</script>
		@endpush
		<!-- MAIN-CONTENT-SECTION END -->
@endsection