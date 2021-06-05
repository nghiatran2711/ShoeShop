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
                    <span>{{$brand->name}}</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <!-- PRODUCT-LEFT-SIDEBAR START -->
                 <form action="{{ route('filter_product_brand',['name'=>$brand->name]) }}" method="GET">
                    <div class="product-left-sidebar">
                        <h2 class="left-title pro-g-page-title">Lọc</h2>
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Giá</span>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="3000000" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Dưới 3 triệu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="3000000-6000000" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Từ 3 triệu - 6 triệu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="6000000-9000000" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Từ 6 triệu - 9 triệu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="9000000" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Trên 9 triệu
                                    </label>
                                </div>
                        </div>
                        <button class="btn btn-success">Tìm</button>
                        <!-- SINGLE SIDEBAR SIZE END -->
                    </div>
                </form>
                <!-- PRODUCT-LEFT-SIDEBAR END -->
                <!-- SINGLE SIDEBAR TAG START -->
                <div class="product-left-sidebar">
                    <h2 class="left-title">Tags </h2>
                    <div class="category-tag">
                        <a href="#">fashion</a>
                        <a href="#">handbags</a>
                        <a href="#">women</a>
                        <a href="#">men</a>
                        <a href="#">kids</a>
                        <a href="#">New</a>
                        <a href="#">Accessories</a>
                        <a href="#">clothing</a>
                        <a href="#">New</a>
                    </div>
                </div>
                <!-- SINGLE SIDEBAR TAG END -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="right-all-product">
                    <div class="product-category-title">
                        <!-- PRODUCT-CATEGORY-TITLE START -->
                        <h1>
                            <span class="cat-name">{{$brand->name}}</span>
                            <span class="count-product">Có {{ $products->count() }} sản phẩm.</span>
                        </h1>
                        <!-- PRODUCT-CATEGORY-TITLE END -->
                    </div>
                    <div class="product-shooting-area">
                        <div class="product-shooting-bar">
                            <!-- SHOORT-BY START -->
                            <div class="shoort-by">
                                <label for="productShort">Sắp xếp</label>
                                <div class="short-select-option">
                                    <form action="{{ route('sort_list_product_brand',['name'=>$brand->name]) }}" method="get">
                                        <select name="sortby" id="productShort" onchange="this.form.submit()">
                                            <option value="">--</option>
                                            <option value="lowest" {{ !empty($sort_by)&&$sort_by=="lowest" ? "selected" : '' }}>Giá: Từ thấp đến cao</option>
                                            <option value="highest" {{ !empty($sort_by)&&$sort_by=="highest" ? "selected" : '' }}>Giá : Từ cao đến thấp</option>
                                            <option value="ascending" {{ !empty($sort_by)&&$sort_by=="ascending" ? "selected" : '' }}>Tên sản phẩm: A đến Z</option>
                                            <option value="descending" {{ !empty($sort_by)&&$sort_by=="descending" ? "selected" : '' }}>Tên sản phẩm: Z đến A</option>
                                        </select>		
                                    </form>										
                                </div>
                            </div>
                        </div>
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
                                            <a href="{{ route('product_details',['id'=>$product->id]) }}"><img src="{{  asset($product->thumbnail) }}" width="189.375" height="189.375" alt="product-image" /></a>
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
                                                    {{ '' }}
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
                                                {{-- <span class="price">{{ number_format($product->price) }} VNĐ</span> --}}
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
                                                    @if (!empty($product->price))
                                                    @php
                                                        $price_discount=$product->price *$discount/100;
                                                        $price_new=$product->price - $price_discount;
                                                    @endphp
                                                    <span class="price">{{ number_format($price_new) }} VNĐ</span>  
                                                    <span class="old-price">{{ number_format($product->price) }} VNĐ</span>
                                                @endif 
                                                @else
                                                <span class="price">{{ number_format($product->price) }} VNĐ</span>               
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