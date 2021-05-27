@extends('layouts.master')
@section('content')
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="index.html">HOME</a>
                    <span><i class="fa fa-caret-right"></i></span>
                    <span>Search</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="right-all-product">
                    <!-- PRODUCT-CATEGORY-HEADER START -->
                    {{-- <div class="product-category-header">
                        <div class="category-header-image">
                            <img src="{{ asset('frontend/img/category-header.jpg') }}" alt="category-header" />
                            <div class="category-header-text">
                                <h2>Women </h2>
                                <strong>You will find here all woman fashion collections.</strong>
                                <p>This category includes all the basics of your wardrobe and much more:<br /> shoes, accessories, printed t-shirts, feminine dresses, women's jeans!</p>
                            </div>									
                        </div>
                    </div> --}}
                    <!-- PRODUCT-CATEGORY-HEADER END -->
                    <div class="product-category-title">
                        <!-- PRODUCT-CATEGORY-TITLE START -->
                        <h1>
                            {{-- <span class="cat-name">{{ $cate->name }}</span> --}}
                            
                            @if ($products->count()>0)
                                <span class="count-product">There are {{ $products->count() }} products.</span>
                            @else
                            <span class="count-product">There are 0 products.</span>
                            @endif
                        </h1>
                        <!-- PRODUCT-CATEGORY-TITLE END -->
                    </div>
                    <div class="product-shooting-area">
                        {{-- <div class="product-shooting-bar"> --}}
                            <!-- SHOORT-BY START -->
                            {{-- <div class="shoort-by">
                                <label for="productShort">Sort by</label>
                                <div class="short-select-option">
                                    <select name="sortby" id="productShort">
                                        <option value="">--</option>
                                        <option value="">Price: Lowest first</option>
                                        <option value="">Price: Highest first</option>
                                        <option value="">Product Name: A to Z</option>
                                        <option value="">Product Name: Z to A</option>
                                        <option value="">In stock</option>
                                        <option value="">Reference: Lowest first</option>
                                        <option value="">Reference: Highest first</option>
                                    </select>												
                                </div>
                            </div> --}}
                            <!-- SHOORT-BY END -->
                            <!-- SHOW-PAGE START -->
                            {{-- <div class="show-page">
                                <label for="perPage">Show</label>
                                <div class="s-page-select-option">
                                    <select name="show" id="perPage">
                                        <option value="">11</option>
                                        <option value="">12</option>
                                    </select>													
                                </div>
                                <span>per page</span>										
                            </div> --}}
                            <!-- SHOW-PAGE END -->
                            <!-- VIEW-SYSTEAM START -->
                            {{-- <div class="view-systeam">
                                <label for="perPage">View:</label>
                                <ul>
                                    <li class="active"><a href="shop-gird.html"><i class="fa fa-th-large"></i></a><br />Grid</li>
                                    <li><a href="shop-list.html"><i class="fa fa-th-list"></i></a><br />List</li>
                                </ul>
                            </div> --}}
                            <!-- VIEW-SYSTEAM END -->
                        {{-- </div> --}}
                        <!-- PRODUCT-SHOOTING-RESULT START -->
                        {{-- <div class="product-shooting-result">
                            <form action="#">
                                <button class="btn compare-button">
                                    Compare (<span class="compare-value">1</span>)
                                    <i class="fa fa-chevron-right"></i>
                                </button>
                            </form>
                            <div class="showing-item">
                                <span>Showing 1 - 12 of 13 items</span>
                            </div>
                            <div class="showing-next-prev">
                                <ul class="pagination-bar">
                                    <li class="disabled">
                                        <a href="#" ><i class="fa fa-chevron-left"></i>Previous</a>
                                    </li>
                                    <li class="active">
                                        <span><a class="pagi-num" href="#">1</a></span>
                                    </li>
                                    <li>
                                        <span><a class="pagi-num" href="#">2</a></span>
                                    </li>
                                    <li>
                                        <a href="#" >Next<i class="fa fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                                <form action="#">
                                    <button class="btn showall-button">Show all</button>
                                </form>
                            </div>
                        </div> --}}
                        <!-- PRODUCT-SHOOTING-RESULT END -->
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
                                        <a href="single-product.html"><img src="{{ asset($product->thumbnail) }}" alt="product-image" /></a>
                                        <a href="single-product.html" class="new-mark-box">new</a>
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
                                        <a href="single-product.html">{{ $product->name }}</a>
                                                                <div class="price-box">
                                                                    @if (!empty($product->latestPrice()->price))
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
                <div class="product-shooting-result product-shooting-result-border">
                    {{-- <form action="#">
                        <button class="btn compare-button">
                            Compare (<strong class="compare-value">1</strong>)
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </form> --}}
                    <div class="showing-item">
                        <span>Showing 1 - 12 of 13 items</span>
                    </div>
                    <div class="showing-next-prev">
                        <ul class="pagination-bar">
                            <li class="disabled">
                                <a href="#" ><i class="fa fa-chevron-left"></i>Previous</a>
                            </li>
                            <li class="active">
                                <span><a class="pagi-num" href="#">1</a></span>
                            </li>
                            <li>
                                <span><a class="pagi-num" href="#">2</a></span>
                            </li>
                            <li>
                                <a href="#" >Next<i class="fa fa-chevron-right"></i></a>
                            </li>
                        </ul>
                        {{-- <form action="#">
                            <button class="btn showall-button">Show all</button>
                        </form> --}}
                    </div>
                </div>	
                <!-- PRODUCT-SHOOTING-RESULT END -->
            </div>
        </div>
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
@endsection