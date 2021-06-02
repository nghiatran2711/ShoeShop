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
                    <span>{{$cate->name}}</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- PRODUCT-LEFT-SIDEBAR START -->
                <form action="{{ route('filter_product_category',['name'=>$cate->name]) }}" method="GET">
                    <div class="product-left-sidebar">
                        <h2 class="left-title pro-g-page-title">Catalog</h2>
                        <!-- SINGLE SIDEBAR SIZE START -->
                        {{-- <div class="product-single-sidebar">
                            <span class="sidebar-title">Size</span>
                            <ul>
                                @foreach ($sizes as $key=>$value )   
                                <li>
                                    <label class="cheker">
                                        <input type="checkbox" name="size[]" value="{{ $key }}"/>
                                        <span></span>
                                    </label>
                                    <a href="#">{{ $value }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div> --}}
                        <div class="product-single-sidebar">
                            <span class="sidebar-title">Price</span>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="3000000" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Dưới 3tr
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="3000000-6000000" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Từ 3tr - 6tr
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="6000000-9000000" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Từ 6tr - 9tr
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" value="9000000" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Trên 9tr
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
                            <span class="cat-name">{{$cate->name}}</span>
                            <span class="count-product">There are {{ count($products) }} products.</span>
                        </h1>
                        <!-- PRODUCT-CATEGORY-TITLE END -->
                    </div>
                    <div class="product-shooting-area">
                        <div class="product-shooting-bar">
                            <!-- SHOORT-BY START -->
                            <div class="shoort-by">
                                <label for="productShort">Sort by</label>
                                <div class="short-select-option">
                                    <form action="{{ route('sort_list_product_category',['name'=>$cate->name]) }}" method="GET">
                                        <select name="sortby" id="productShort" onchange="this.form.submit()">
                                            <option value="">--</option>
                                            <option value="lowest">Price: Lowest first</option>
                                            <option value="highest">Price: Highest first</option>
                                            <option value="ascending">Product Name: A to Z</option>
                                            <option value="descending">Product Name: Z to A</option>
                                        </select>	
                                    </form>											
                                </div>
                            </div>
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
                        </div>
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
                                        <a href="{{ route('product_details',['id'=>$product->id]) }}"><img src="{{  asset($product->thumbnail) }}" width="189.375" height="189.375" alt="product-image" /></a>
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