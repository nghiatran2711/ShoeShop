@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/carts/checkout.css') }}">
@endpush
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
							<span>Thông tin đặt hàng</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
                    {{-- show error message --}}
                    @if(Session::has('error'))
                    <p class="text-danger">{{ Session::get('error') }}</p>
                    @endif
					{{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPPING-CART SUMMARY START -->
						<h2 class="page-title">Shopping-cart summary <span class="shop-pro-item">Your shopping cart contains: {{ Cart::content()->count() }} products</span></h2>
						<!-- SHOPPING-CART SUMMARY END -->
					</div>	 --}}
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            @php
                                $total=0;
                            @endphp
                            @if (!empty(Cart::content()))
                                <h2>Thông tin đơn hàng</h2>
                                <hr>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        @foreach (Cart::content() as $row )
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <a href="#"><img alt="Blouse" src="{{ asset($row->options->has('thumbnail') ? $row->options->thumbnail : '') }}"></a>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                <p class="product-name"><a href="#">{{ $row->name }}</a></p>
                                                <p class="product-name"><a href="#">Kích cỡ: {{ $row->options->has('size') ? $row->options->size : '' }}</a></p>
                                                <p>Số lượng:{{ $row->qty }} </p>
                                                    {{-- {{ number_format($row->price).' '.'VNĐ' }} --}}
                                                    @if ($row->options->discount==0)
															<p class="price">Giá: {{ number_format($row->price).' '.'VNĐ' }}</p>
														@else
															@php
																$price_discount=$row->options->discount * $row->price/100;
																$price_new=$row->price-$price_discount;
															@endphp
															<p class="price" style="color: red">Giá giảm: {{ number_format($price_new).' '.'VNĐ' }}</p>
															<p class="old-price">Giá gốc:{{ number_format($row->price).' '.'VNĐ' }}</p>
														@endif
                                            </div>
                                                @if ($row->options->discount==0)
                                                    @php
                                                         $subtotal=$row->price* $row->qty;
                                                    @endphp
                                                            {{-- <span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span> --}}
                                                @else
                                                    @php
                                                        $subtotal=$price_new * $row->qty;
                                                    @endphp
                                                            {{-- <span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span> --}}
                                                @endif

                                                @php
                                                    $total+=$subtotal;
                                                @endphp
                                        @endforeach
                                    
                                    
                                </div>
                                <h3>Thông tin thanh toán</h3>
                                <p>Tổng số lượng: {{ Cart::count() }}</p>
                                <p>Tổng tiền: {{ number_format($total) . " VNĐ" }}</p>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <h2>Thông tin cá nhân</h2>
                            <hr>
                            <div class="p-2">
                                <label for="">Họ và tên</label>
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                            <div class="p-2">
                                <label for="">Email</label>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                            <div class="p-2">
                                <label for="">Số điện thoại</label>
                                <p>{{ Auth::user()->phone }}</p>
                            </div>
                            <div class="p-2">
                                <label for="">Địa chỉ</label>
                                <p>{{ Auth::user()->address }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                           <h2>Phương thức thanh toán</h2>
                           <hr>
                            <div class="border p-2">
                                <form action="{{route('checkout_complete') }}" method="POST" id="frm-checkout">
                                    @csrf
                                    <div class="form-group">
                                        <input type="radio" value="1" name="payment_type" id="payment-type-1" checked class="payment-type">
                                        <label for="payment-type-1">Thanh toán tại nhà</label>
                                        <br>
                                        <input type="radio" value="2" name="payment_type" id="payment-type-2" class="payment-type">
                                        <label for="payment-type-2">Thanh toán bằng Credit Card</label>
                                    </div>
                                    <div class="form-group" id="payment-info">
                                        <div class="border p-2">
                                            <div class="form-group mb-2">
                                                <label for="">Credit Card Number</label>
                                                <input type="number" value="" name="cc_number" class="form-control" placeholder="" autocomplete="off">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="">Expiration Date</label>
                                                <input type="text" value="" name="cc_expire_date" class="form-control" placeholder="" autocomplete="off">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="">Signature/ CVV2 Code</label>
                                                <input type="number" value="" name="cc_cvv" class="form-control" placeholder="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="returne-continue-shop">
                                            <button type="submit" class="procedtocheckout" id="btn-checkout" onclick="return confirm('Are you sure checkout your Order?')">Đặt hàng<i class="fa fa-chevron-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
						<!-- CART TABLE_BLOCK END -->
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="{{ route('index') }}" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->						
					</div>
				</div>
			</div>
		</section>
@endsection
@push('js')
    <script src="{{ asset('frontend/js/carts/checkout.js') }}"></script>
@endpush