@extends('layouts.master')
@section('content')
    <!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">Trang chủ<span><i class="fa fa-caret-right"></i> </span> </a>
							{{-- <span> <i class="fa fa-caret-right"> </i> </span> --}}
							{{-- <a href="shop-gird.html"> women </a> --}}
							<span>{{ $product->name }} </span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- SINGLE-PRODUCT-DESCRIPTION START -->
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
								<div class="single-product-view">
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="thumbnail_1">
											<div class="single-product-image">
												<img src="{{ asset($product->thumbnail) }}" alt="single-product-image" />
												<a class="new-mark-box" href="#">
												</a>
												<a class="fancybox" href="{{ asset($product->thumbnail) }}" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										{{-- <div class="tab-pane" id="thumbnail_6">
											<div class="single-product-image">
												<img src="{{ asset('frontend/img/product/sale/12.jpg') }}" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="{{ asset('frontend/img/product/sale/12.jpg') }}" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div> --}}
									</div>										
								</div>
								<div class="select-product">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs select-product-tab bxslider">
										@foreach ($product->product_images as $product_image)
										<li class="active">
											<a href="#thumbnail_1" data-toggle="tab"><img src="{{ asset($product_image->url) }}" alt="pro-thumbnail" /></a>
										</li>
										@endforeach
										
									</ul>										
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
								<form action="{{ route('add_cart') }}" method="GET">
									@csrf
									<div class="single-product-descirption">
										<h2>{{ $product->name }}</h2>
										{{-- <div class="single-product-review-box">
											<div class="rating-box">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-empty"></i>
											</div>
											<div class="read-reviews">
												<a href="#">Read reviews (1)</a>
											</div>
											<div class="write-review">
												<a href="#">Write a review</a>
											</div>		
										</div> --}}
										<div class="single-product-condition">
											{{-- <p>Reference: <span>demo_1</span></p> --}}
											{{-- <p>Condition: <span>New product</span></p> --}}
										</div>
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
												<div class="single-product-condition">
													{{-- <p>Reference: <span>demo_1</span></p> --}}
													<p>Giảm giá: <span>{{ 'Sale ' .$discount . '%' }}</span></p>
												</div>
											@else
												<p>Giảm giá: <span>Không</span></p>
											@endif
										
										<div class="single-product-price">
											@php
											$currentDate = date('Y-m-d');
											$discount=[];
										@endphp
										@foreach ($product->promotions as $promotion)
											@if($promotion->begin_date<=$currentDate && $promotion->end_date>=$currentDate)
													@php
														$discount=$promotion->discount;
														$promotion_id=$promotion->id;
													@endphp
											@endif  
										@endforeach
										@if (!empty($discount))
											@if (!empty($product->latestPrice()->price))
												@php
													$price_discount=$product->latestPrice()->price *$discount/100;
													$price_new=$product->latestPrice()->price - $price_discount;
												@endphp
												<h2>Giá giảm :</h2><h2 class="price"> {{ number_format($price_new)." "."VNĐ" }}</h2>  
												<h3>Giá gốc :</h3><h3 class="old-price"> {{ number_format($product->latestPrice()->price)." "."VNĐ" }}</h3>
											@endif 
										@else
										<h2>Giá :</h2><h2 class="price">  {{ number_format($product->latestPrice()->price) }} VNĐ</h2>               
										 @endif
											
										</div>
										<div class="single-product-desc">
											<p>{{ $product->description }}</p>
											
										</div>
										<div class="single-product-quantity">
											<p class="small-title">Số lượng</p> 
											<div class="cart-quantity">
												<div class="cart-plus-minus-button single-qty-btn">
													<input class="cart-plus-minus sing-pro-qty" type="number" name="qty" value="1">
												</div>
											</div>
										</div>
										<div class="single-product-size">
											{{-- <div class="product-in-stock">
												<p>300 products invertory</p>
											</div>
											<br> --}}
											<p class="small-title">Kích cỡ </p> 
											<select name="product_size" id="product-size">
												@foreach ($product->sizes as $size )
													<option value="{{ $size->id }}">{{ $size->name }}</option>
												@endforeach
												
											</select>
										</div>
										{{-- <div class="single-product-color">
											<p class="small-title">Color </p> 
											<a href="#"><span></span></a>
											<a class="color-blue" href="#"><span></span></a>
										</div> --}}
										<div class="single-product-add-cart">
											<input type="hidden" name="product_id" value="{{ $product->id }}">
											@if (!empty($discount))
												<input type="hidden" name="discount" value="{{ $discount }}">
												<input type="hidden" name="promotion_id" value="{{ $promotion_id }}">
											@else
												<input type="hidden" name="discount" value="0">
											@endif
											
											<button type="submit" class="btn btn-danger"><i class="fa fa-shopping-cart cart-icon"></i> Thêm giỏ hàng</button>
											<br>
											{{-- show message --}}
											@if(Session::has('message'))
											<p class="text-danger" style="color: red;">{{ Session::get('message') }}</p>
											@endif
										</div>
									</div>
								</form>
							</div>
						</div>
						<!-- SINGLE-PRODUCT-DESCRIPTION END -->
						<!-- SINGLE-PRODUCT INFO TAB START -->
						<div class="row">
							<div class="col-sm-12">
								<div class="product-more-info-tab">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs more-info-tab">
										<li class="active"><a href="#moreinfo" data-toggle="tab">Mô tả</a></li>
										<li><a href="#datasheet" data-toggle="tab">Thông tin</a></li>
										<li><a href="#review" data-toggle="tab">Đánh giá</a></li>
									</ul>
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="moreinfo">
											<div class="tab-description">
												<p>{{ $product->product_detail->content }}</p>
											</div>
										</div>
										<div class="tab-pane" id="datasheet">
											<div class="deta-sheet">
												<table class="table-data-sheet">			
													<tbody>
														<tr class="odd">
															<td>Compositions</td>
															<td>Cotton</td>
														</tr>
														<tr class="even">
															<td class="td-bg">Styles</td>
															<td class="td-bg">Casual</td>
														</tr>
														<tr class="odd">
															<td>Properties</td>
															<td>Short Sleeve</td>
														</tr>
													</tbody>
												</table>				
											</div>
										</div>
										<div class="tab-pane" id="review">
											<div class="row tab-review-row">
												<div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
													<div class="tab-rating-box">
														<span>Grade</span>
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>	
														<div class="review-author-info">
															<strong>write A REVIEW</strong>
															<span>06/22/2015</span>
														</div>															
													</div>
												</div>
												<div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
													<div class="write-your-review">
														<p><strong>write A REVIEW</strong></p>
														<p>write A REVIEW</p>
														<span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
														<a href="#">Report abuse </a>
													</div>
												</div>
												<a href="#" class="write-review-btn">Write your review!</a>
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT INFO TAB END -->
						<!-- RELATED-PRODUCTS-AREA START -->
						<div class="row">
							<div class="col-sm-12">
								<div class="left-title-area">
									<h2 class="left-title">Sản phẩm liên quan</h2>
								</div>	
							</div>
							<div class="related-product-area featured-products-area">
								<div class="col-sm-12">
									<div class=" row">
										<!-- RELATED-CAROUSEL START -->
										<div class="related-product">
											<!-- SINGLE-PRODUCT-ITEM START -->
                                            @foreach ($product_relateds as $product_related )
                                                <div class="item">
                                                    <div class="single-product-item">
                                                        <div class="product-image">
                                                            <a href="#"><img src="{{ asset($product_related->thumbnail) }}" alt="product-image" /></a>
                                                        </div>
                                                        <div class="product-info">
                                                            {{-- <div class="customar-comments-box">
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
                                                            </div> --}}
                                                            <a href="#">{{ $product_related->name }}</a>
                                                            <div class="price-box">
                                                                @if (!empty($product_related->latestPrice()->price))
                                                                    <span class="price">{{ number_format($product_related->latestPrice()->price)." "."VNĐ" }}</span>
                                                                @endif
                                                                
                                                            </div>
                                                        </div>
                                                    </div>							
                                                </div>
                                            @endforeach
											<!-- SINGLE-PRODUCT-ITEM END -->
											<!-- SINGLE-PRODUCT-ITEM START -->								
										</div>
										<!-- RELATED-CAROUSEL END -->
									</div>	
								</div>
							</div>	
						</div>
						<!-- RELATED-PRODUCTS-AREA END -->
					</div>
					<!-- RIGHT SIDE BAR START -->
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- SINGLE SIDE BAR START -->
						<div class="single-product-right-sidebar clearfix">
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
						<!-- SINGLE SIDE BAR END -->
						<!-- SINGLE SIDE BAR START -->						
						<div class="single-product-right-sidebar">
							<div class="slider-right zoom-img">
								<a href="#"><img class="img-responsive" src="{{ asset('frontend/img/product/cms11.jpg') }}" alt="sidebar left" /></a>
							</div>							
						</div>
					</div>
					<!-- SINGLE SIDE BAR END -->				
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
@endsection