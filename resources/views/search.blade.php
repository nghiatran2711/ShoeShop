@extends('layouts.master')
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
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="index.html">Trang chủ</a>
                    <span><i class="fa fa-caret-right"></i></span>
                    <span>Tìm kiếm</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="right-all-product">
                    <div class="product-category-title">
                        <!-- PRODUCT-CATEGORY-TITLE START -->
                        <h1>
                            <span class="cat-name">Kết quả tìm kiếm "{{ request()->input('keyword') }}"</span>
                            
                            @if ($products->count()>0)
                                <span class="count-product">Có {{ $products->count() }} sản phẩm.</span>
                            @else
                            <span class="count-product">Có 0 sản phẩm.</span>
                            @endif
                        </h1>
                        <!-- PRODUCT-CATEGORY-TITLE END -->
                    </div>
                    <div class="product-shooting-area">
                    </div>
                </div>
                <!-- ALL GATEGORY-PRODUCT START -->
                <div class="all-gategory-product">
                    <div class="row">
                        <ul class="gategory-product">
                            <!-- SINGLE ITEM START -->
                            @foreach ($products as $key => $product )
                            <li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="single-product-item">
                                    <div class="product-image">
                                        <a href="{{ route('product_details',['id'=>$product->id]) }}"><img src="{{ asset($product->thumbnail) }}" width="263" height="263"  alt="product-image" /></a>
                                        <a href="single-product.html" class="new-mark-box">
                                            @php
                                                $currentDate = date('Y-m-d');
                                                $discount=[];
                                            @endphp
                                            @foreach ($product->promotions as $promotion)
                                                @if($promotion->begin_date<=$currentDate && $promotion->end_date>=$currentDate)
                                                        @php
                                                            $discount=$promotion->discount;
                                                        @endphp
                                                @endif  
                                            @endforeach
                                            @if (!empty($discount))
                                                {{ 'Giảm ' .$discount . '%' }}  
                                            @else
                                                {{ "" }}
                                            @endif
                                        </a>
                                        <div class="overlay-content">
                                            <ul>
                                                <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                {{-- <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="customar-comments-box">
                                            <div class="rating-box">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-empty"></i>
                                            </div>
                                            <div class="review-box">
                                                <span>1 Review(s)</span>
                                            </div>
                                        </div>
                                        <a href="single-product.html">{{ $product->name }}</a>
                                        <div class="price-box">
                                            {{-- @if (!empty($product->latestPrice()->price))
                                                <span class="price">{{ number_format($product->latestPrice()->price) }} VNĐ</span>
                                            @endif --}}
                                            @php
                                                $currentDate = date('Y-m-d');
                                                $discount=[];
                                            @endphp
                                            @foreach ($product->promotions as $promotion)
                                                @if($promotion->begin_date<=$currentDate && $promotion->end_date>=$currentDate)
                                                    @php
                                                        $discount=$promotion->discount;
                                                    @endphp
                                                @endif  
                                            @endforeach
                                            @if (!empty($discount))
                                                @if (!empty($product->latestPrice()->price))
                                                @php
                                                    $price_discount=$product->latestPrice()->price *$discount/100;
                                                    $price_new=$product->latestPrice()->price - $price_discount;
                                                @endphp
                                                <span class="price">{{ number_format($price_new) }} VNĐ</span>  
                                                <span class="old-price">{{ number_format($product->latestPrice()->price) }} VNĐ</span>
                                            @endif 
                                            @else
                                            <span class="price">{{ number_format($product->latestPrice()->price) }} VNĐ</span>               
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>									
                            </li>
                            @endforeach
                            <!-- SINGLE ITEM END -->					
                        </ul>
                    </div>
                </div>
                <!-- ALL GATEGORY-PRODUCT END -->
                <!-- PRODUCT-SHOOTING-RESULT START -->
                    <div class="text-center">
                        {{ $products->appends(request()->input())->links('vendor.pagination.custom') }}
                    </div>
                <!-- PRODUCT-SHOOTING-RESULT END -->
            </div>
        </div>
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
@endsection