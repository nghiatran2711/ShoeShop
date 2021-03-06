@extends('layouts.master')
@section('content')
    @include('layouts.slide')
        <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <!-- LEFT-SIDEBAR END -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="new-product-area">
                                <div class="left-title-area">
                                    <h2 class="left-title">Sản phẩm mới</h2>
                                </div>						
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <!-- HOME2-NEW-PRO-CAROUSEL START -->
                                            <div class="home2-new-pro-carousel">
                                                <!-- NEW-PRODUCT SINGLE ITEM START -->
                                                @foreach ($product_new as $key=>$value )
                                                <div class="item">
                                                    <div class="new-product">
                                                        <div class="single-product-item">
                                                            <div class="product-image">
                                                                <a href="{{ route('product_details',['id'=>$value->id]) }}"><img src="{{  asset($value->thumbnail) }}" width="263" height="263" alt="product-image" /></a>
                                                                <a href="#" class="new-mark-box">
                                                                    @php
                                                                        $currentDate = date('Y-m-d');
                                                                        $discount=[];
                                                                    @endphp
                                                                    @foreach ($value->promotions as $promotion)
                                                                        @if($promotion->begin_date<=$currentDate && $promotion->end_date>=$currentDate)
                                                                               @php
                                                                                   $discount=$promotion->discount;
                                                                               @endphp
                                                                        @endif  
                                                                    @endforeach
                                                                    @if (!empty($discount))
                                                                        {{ 'Giảm ' .$discount . '%' }}  
                                                                    @else
                                                                        {{ "Mới" }}
                                                                    @endif
                                                                    </a>
                                    
                                                                <div class="overlay-content">
                                                                    <ul>
                                                                        <li><a href="{{ route('product_details',['id'=>$value->id]) }}" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                                        {{-- <li><a href="{{ route('add_cart',['id'=>$value->id]) }}" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
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
                                                                        <span>3 Review(s)</span>
                                                                    </div>
                                                                </div>
                                                                <a href="{{ route('product_details',['id'=>$value->id]) }}">{{ $value->name }}</a>
                                                                <div class="price-box">
                                                                    {{-- @if (!empty($discount))
                                                                        @if (!empty($value->latestPrice()->price))
                                                                            @php
                                                                                $price_discount=$value->latestPrice()->price *$discount/100;
                                                                                $price_new=$value->latestPrice()->price - $price_discount;
                                                                            @endphp
                                                                            <span class="price">{{ number_format($price_new) }} VNĐ</span>  
                                                                            <span class="old-price">{{ number_format($value->latestPrice()->price) }} VNĐ</span>
                                                                        @endif 
                                                                    @else
                                                                    <span class="price">{{ number_format($value->latestPrice()->price) }} VNĐ</span>               
                                                                    @endif --}}
                                                                    {{-- @php
                                                                        $currentDate = date('Y-m-d');
                                                                    @endphp
                                                                    @foreach ($value->promotions as $promotion)
                                                                        @if($promotion->begin_date<=$currentDate && $promotion->end_date>=$currentDate)
                                                                               @php
                                                                                   $discount=$promotion->discount;
                                                                               @endphp
                                                                               @if (!empty($discount))
                                                                                    @if (!empty($value->latestPrice()->price))
                                                                                        @php
                                                                                            $price_discount=$value->latestPrice()->price *$discount/100;
                                                                                            $price_new=$value->latestPrice()->price - $price_discount;
                                                                                        @endphp
                                                                                        <span class="price">{{ number_format($price_new) }} VNĐ</span>  
                                                                                        <span class="old-price">{{ number_format($value->latestPrice()->price) }} VNĐ</span>
                                                                                    @endif 
                                                                                @else
                                                                                <span class="price">{{ number_format($value->latestPrice()->price) }} VNĐ</span>               
                                                                                @endif
                                                                              
                                                                        @endif  
                                                                    @endforeach --}}
                                                                    @php
                                                                        $currentDate = date('Y-m-d');
                                                                        $discount=[];
                                                                    @endphp
                                                                    @foreach ($value->promotions as $promotion)
                                                                        @if($promotion->begin_date<=$currentDate && $promotion->end_date>=$currentDate)
                                                                               @php
                                                                                   $discount=$promotion->discount;
                                                                               @endphp
                                                                        @endif  
                                                                    @endforeach
                                                                    @if (!empty($discount))
                                                                        @if (!empty($value->latestPrice()->price))
                                                                        @php
                                                                            $price_discount=$value->latestPrice()->price *$discount/100;
                                                                            $price_new=$value->latestPrice()->price - $price_discount;
                                                                        @endphp
                                                                        <span class="price">{{ number_format($price_new) }} VNĐ</span>  
                                                                        <span class="old-price">{{ number_format($value->latestPrice()->price) }} VNĐ</span>
                                                                    @endif 
                                                                    @else
                                                                    <span class="price">{{ number_format($value->latestPrice()->price) }} VNĐ</span>               
                                                                    @endif
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <!-- NEW-PRODUCT SINGLE ITEM END -->
                                            </div>
                                            <!-- HOME2-NEW-PRO-CAROUSEL END -->
                                        </div>
                                    </div>
                                </div>
                            </div>										
                        </div>
                        {{-- <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <!-- TOW-COLUMN-ADD START -->
                            <div class="tow-column-add zoom-img">
                                <a href="#"><img src="{{ asset('frontend/img/product/shope-add12.jpg') }}" alt="shope-add" /></a>
                            </div>
                            <!-- TOW-COLUMN-ADD END -->
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <!-- TOW-COLUMN-ADD START -->
                            <div class="one-column-add zoom-img">
                                <a href="#"><img src="{{ asset('frontend/img/product/shope-add22.jpg') }}" alt="shope-add" /></a>
                            </div>	
                            <!-- TOW-COLUMN-ADD END -->
                        </div>	 --}}
                        {{-- <div class="col-xs-12">
                            <!-- SALE-PODUCT-AREA START -->
                            <div class="sale-poduct-area new-product-area">
                                <div class="left-title-area">
                                    <h2 class="left-title">Sale Products</h2>
                                </div>
                                <div class="row">
                                    <!-- HOME2-SALE-CAROUSEL START -->
                                    <div class="home2-sale-carousel">
                                        <!-- NEW-PRODUCT SINGLE ITEM START -->
                                        <div class="item">
                                            <div class="new-product">
                                                <div class="single-product-item">
                                                    <div class="product-image">
                                                        <a href="#"><img src="" alt="product-image" /></a>
                                                        <a href="#" class="new-mark-box">
                                                       new
                                                        </a>
                                                        <div class="overlay-content">
                                                            <ul>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                                <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="customar-comments-box">
                                                            <div class="rating-box">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                            </div>
                                                            <div class="review-box">
                                                                <span>1 Review(s)</span>
                                                            </div>
                                                        </div>
                                                        <a href="single-product.html">sssssssssssssssssss</a>
                                                        <div class="price-box">
                                                            <span class="price">
                                                              VNĐ</span>
                                                            <span class="old-price"> VNĐ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- NEW-PRODUCT SINGLE ITEM END -->
                                    </div>
                                    <!-- HOME2-SALE-CAROUSEL END -->
                                </div>
                            </div>
                            <!-- SALE-PODUCT-AREA end -->
                        </div> --}}
                    </div>	
                </div>	
            </div>
        </div>
    </section>	
    <!-- MAIN-CONTENT-SECTION END -->
    <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section-full-column">
        <div class="container">
            <div class="row">
                <!-- IMAGE-ADD-AREA START -->
                <div class="image-add-area">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <!-- SINGLE ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img src="{{ asset('frontend/img/product/cms21.jpg') }}" alt="shope-add" /></a>
                        </div>
                        <!-- SINGLE ADD END -->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <!-- SINGLE ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img src="{{ asset('frontend/img/product/cms22.jpg') }}" alt="shope-add" /></a>
                        </div>
                        <!-- SINGLE ADD END -->
                    </div>						
                </div>
                <!-- IMAGE-ADD-AREA END -->
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- FEATURED-PRODUCTS-AREA START -->
                    <div class="featured-products-area">
                        <div class="left-title-area">
                            <h2 class="left-title">Sản phẩm nổi bật</h2>
                        </div>	
                        <div class="row">
                            <!-- FEARTURED-CAROUSEL START -->	
                            <div class="feartured-carousel">
                                <!-- SINGLE ITEM START -->
                                @foreach ($product_feature->chunk(2) as $chunk )
                                <div class="item">
                                    @foreach($chunk as $product)                                       
                                    <!-- SINGLE-PRODUCT-ITEM START -->
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="{{ route('product_details',['id'=>$product->id]) }}"><img src="{{ asset($product->thumbnail) }}" width="204" height="204" alt="product-image" /></a>
                                            <a href="#" class="new-mark-box">
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
                                                    {{ "Nổi bật" }}
                                                @endif
                                            </a>
                                            <div class="overlay-content">
                                                <ul>
                                                    <li><a href="{{ route('product_details',['id'=>$product->id]) }}" title="Quick view"><i class="fa fa-search"></i></a></li>
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
                                                {{-- @php
                                                    $currentDate = date('Y-m-d');
                                                @endphp
                                                @foreach ($product->promotions as $promotion_feature)
                                                    @if($promotion_feature->begin_date<=$currentDate && $promotion_feature->end_date>=$currentDate)
                                                            @php
                                                                $discount_feature=$promotion_feature->discount;
                                                            @endphp   
                                                            @if (!empty($discount_feature) && $promotion_feature->pivot->product_id==$product->id)
                                                                @if (!empty($product->latestPrice()->price))
                                                                    @php
                                                                        $price_discount=$product->latestPrice()->price * $discount_feature/100;
                                                                        $price_new=$product->latestPrice()->price-$price_discount;
                                                                    @endphp
                                                                        <span class="price">{{ number_format($price_new) }} VNĐ</span>
                                                                        <span class="old-price">{{ number_format($product->latestPrice()->price) }} VNĐ</span>
                                                                @endif
                                                            @else
                                                                <span class="price">{{ number_format($product->latestPrice()->price) }} VNĐ</span>
                                                            @endif            
                                                    @endif 
                                               @endforeach --}}
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
                                    @endforeach
                                    <!-- SINGLE-PRODUCT-ITEM END -->
                                </div>
                                @endforeach
                                <!-- SINGLE ITEM END -->								
                            </div>
                            <!-- FEARTURED-CAROUSEL END -->
                        </div>
                    </div>
                    <!-- FEATURED-PRODUCTS-AREA END -->
                </div>						
            </div>
            <div class="row">
                <!-- IMAGE-ADD-AREA START -->
                <div class="image-add-area">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- SINGLE ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img alt="shope-add" src="{{ asset('frontend/img/product/one-helf1.jpg') }}"></a>
                        </div>
                        <!-- SINGLE ADD END -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- SINGLE ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img alt="shope-add" src="{{ asset('frontend/img/product/one-helf2.jpg') }}"></a>
                        </div>
                        <!-- SINGLE ADD END -->
                    </div>						
                </div>
                <!-- IMAGE-ADD-AREA END -->					
            </div>
        </div>
    </section>
    <!-- MAIN-CONTENT-SECTION END -->
    <!-- LATEST-NEWS-AREA START -->
    <section class="latest-news-area">
        <div class="container">
            <div class="row">
                <div class="latest-news-row">
                    <div class="center-title-area">
                        <h2 class="center-title"><a href="#">latest news</a></h2>
                    </div>	
                    <div class="col-xs-12">
                        <div class="row">
                            <!-- LATEST-NEWS-CAROUSEL START -->
                            <div class="latest-news-carousel">
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/1.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">What is Lorem Ipsum?</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/2.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">Share the Love for printing</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->								
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/3.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">Answers your Questions P..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->								
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/4.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">What is Bootstrap? – History</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->								
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/5.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">Share the Love for..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->								
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/6.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">What is Bootstrap? – The History a..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->	
                                <!-- LATEST-NEWS-SINGLE-POST START -->								
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/3.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">Answers your Questions P..</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->
                                <!-- LATEST-NEWS-SINGLE-POST START -->								
                                <div class="item">
                                    <div class="latest-news-post">
                                        <div class="single-latest-post">
                                            <a href="#"><img src="{{ asset('frontend/img/latest-news/4.jpg') }}" alt="latest-post" /></a>
                                            <h2><a href="#">What is Bootstrap? – History</a></h2>
                                            <p>Lorem Ipsum is simply dummy text of the printing and Type setting industry. Lorem Ipsum has been...</p>
                                            <div class="latest-post-info">
                                                <i class="fa fa-calendar"></i><span>2015-06-20 04:51:43</span>
                                            </div>
                                            <div class="read-more">
                                                <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- LATEST-NEWS-SINGLE-POST END -->						
                            </div>	
                            <!-- LATEST-NEWS-CAROUSEL START -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- LATEST-NEWS-AREA END -->
@endsection