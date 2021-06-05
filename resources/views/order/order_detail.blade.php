@extends('layouts.master')
@section('content')
{{-- show message --}}
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="{{ route('index') }}">Trang chủ</a>
                    <span><i class="fa fa-caret-right	"></i></span>
                    <span>Chi tiết đơn hàng {{ $order_id }}</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- SHOPPING-CART SUMMARY START -->
                <h2 class="page-title">Đơn hàng vừa đặt <span class="shop-pro-item">Mã đơn hàng là {{ $order_id }}</span></h2>
                <!-- SHOPPING-CART SUMMARY END -->
            </div>	 --}}
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- CART TABLE_BLOCK START -->
                <div class="table-responsive">
                    <!-- TABLE START -->
                    <table class="table table-bordered" id="cart-summary">
                        <!-- TABLE HEADER START -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="cart-product">Hình ảnh</th>
                                <th class="cart-description">Tên sản phẩm</th>
                                <th class="cart-avail text-center">Kích cỡ</th>
                                <th class="cart-unit text-right">Giá</th>
                                <th class="cart_quantity text-center">Số lượng</th>
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
                            @if (!empty($order_details))
                                @foreach ($order_details as $key =>$order_detail )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td class="cart-product">
                                            <a href="#"><img alt="Blouse" src="{{ asset($order_detail->thumbnail) }}" width="70" height="70"></a>
                                        </td>
                                        <td class="cart-description">
                                            <p class="product-name"><a href="#">{{ $order_detail->product_name }}</a></p>
                                        </td>
                                        <td class="cart-description">
                                            <p class="product-name"><a href="#">Size: {{ $order_detail->size_name }}</a></p>
                                        </td>
                                        <td class="cart-unit">
                                            <ul class="price text-right">
                                                @if ($order_detail->discount==Null)
                                                     <li class="price">{{ number_format($order_detail->price).' '.'VNĐ' }}</li>
                                                @else
                                                    @php
                                                        $price_discount=$order_detail->discount * $order_detail->price/100;
                                                        $price_new=$order_detail->price-$price_discount;
                                                    @endphp
                                                    <li class="price" style="color: red">{{ number_format($price_new).' '.'VNĐ' }}</li>
                                                    <li class="old-price">{{ number_format($order_detail->price).' '.'VNĐ' }}</li>
                                                @endif
                                                {{-- <li class="price">{{ number_format($order_detail->price) .' '. 'VNĐ' }}</li> --}}
                                            </ul>
                                        </td>
                                        <td class="cart_quantity text-center">
                                            
                                            <ul class="price text-right">
                                                <li class="price">{{ $order_detail->quantity }}</li>
                                            </ul>
                                        </td>
                                       
                                        <td class="cart-total">
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
                            <tr>
                                <td class="cart_voucher" colspan="3" rowspan="4"></td>
                                <td class="total-price-container text-right" colspan="3">
                                    <span>Tổng tiền</span>
                                </td>
                                <td id="total-price-container" class="price" colspan="1">
                                    <span id="total-price">{{  number_format($total) .' '. "VNĐ" }}</span>
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
                    <a href="{{ route('index') }}" class="continueshoping"><i class="fa fa-chevron-left"></i>Đến trang chủ</a>

                </div>	
                <!-- RETURNE-CONTINUE-SHOP END -->						
            </div>
        </div>
    </div>
</section>
@endsection