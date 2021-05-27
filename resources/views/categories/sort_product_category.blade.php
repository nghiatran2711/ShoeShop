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
                <div class="product-left-sidebar">
                    <h2 class="left-title pro-g-page-title">Catalog</h2>
                    <!-- SINGLE SIDEBAR ENABLED FILTERS START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">ENABLED FILTERS:</span>
                        <ul class="filtering-menu">
                            <li>
                                Categories: Dresses 
                                <a href="#"><i class="fa fa-remove"></i></a>
                            </li>
                            <li>
                                Avaiale: In stock 
                                <a href="#"><i class="fa fa-remove"></i></a>
                            </li>
                            <li>
                                Categories: Dresses 
                                <a href="#"><i class="fa fa-remove"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- SINGLE SIDEBAR ENABLED FILTERS END -->
                    <!-- SINGLE SIDEBAR CATEGORIES START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Categories</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="categories"/>
                                    <span></span>
                                </label>
                                <a href="#">Tops<span> (12)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="categories"/>
                                    <span></span>
                                </label>
                                <a href="#">Dresses<span> (13)</span></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- SINGLE SIDEBAR CATEGORIES END -->
                    <!-- SINGLE SIDEBAR AVAILABILITY START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Availability</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="availability"/>
                                    <span></span>
                                </label>
                                <a href="#">In stock<span> (13)</span></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- SINGLE SIDEBAR AVAILABILITY END -->
                    <!-- SINGLE SIDEBAR CONDITION START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Condition</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="condition"/>
                                    <span></span>
                                </label>
                                <a href="#">new<span> (13)</span></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- SINGLE SIDEBAR CONDITION END -->
                    <!-- SINGLE SIDEBAR MANUFACTURER START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Manufacturer</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="manufacturer"/>
                                    <span></span>
                                </label>
                                <a href="#">Fashion Manufacturer<span> (13)</span></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- SINGLE SIDEBAR MANUFACTURER END -->
                    <!-- SINGLE SIDEBAR PRICE START -->
                    <div class="product-single-sidebar">
                        <span class="sidebar-title">Price</span>
                        <ul>
                            <li> 
                                <label><strong>Range:</strong><input type="text" id="slidevalue" /></label>
                            </li>
                            <li>
                                <div id="price-range"></div>	
                            </li>
                        </ul>
                    </div>
                    <!-- SINGLE SIDEBAR PRICE END -->
                    <!-- SINGLE SIDEBAR SIZE START -->
                    <div class="product-single-sidebar">
                        <span class="sidebar-title">Size</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="Size"/>
                                    <span></span>
                                </label>
                                <a href="#">S<span> (10)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="Size"/>
                                    <span></span>
                                </label>
                                <a href="#">m<span> (10)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="Size"/>
                                    <span></span>
                                </label>
                                <a href="#">l<span> (10)</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- SINGLE SIDEBAR SIZE END -->
                    <!-- SINGLE SIDEBAR COLOR START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Color</span>
                        <ul class="product-color-var">
                            <li>
                                <i class="fa fa-square color-beige"></i>
                                <a href="#">Beige<span> (1)</span></a>
                            </li>
                            <li>
                                <i class="fa fa-square color-white"></i>
                                <a href="#">white<span> (2)</span></a>
                            </li>	
                            <li>
                                <i class="fa fa-square color-black"></i>
                                <a href="#">black<span> (2)</span></a>
                            </li>									
                            <li>
                                <i class="fa fa-square color-orange"></i>
                                <a href="#">orange<span> (5)</span></a>
                            </li>
                            <li>
                                <i class="fa fa-square color-blue"></i>
                                <a href="#">blue<span> (8)</span></a>
                            </li>
                            <li>
                                <i class="fa fa-square color-green"></i>
                                <a href="#">green<span> (3)</span></a>
                            </li>
                            <li>
                                <i class="fa fa-square color-yellow"></i>
                                <a href="#">yellow<span> (4)</span></a>
                            </li>
                            <li>
                                <i class="fa fa-square color-pink"></i>
                                <a href="#">pink<span> (6)</span></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- SINGLE SIDEBAR COLOR END -->
                    <!-- SINGLE SIDEBAR COMPOSITIONS START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Compositions</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="compositions"/>
                                    <span></span>
                                </label>
                                <a href="#">Cotton<span>(8)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="compositions"/>
                                    <span></span>
                                </label>
                                <a href="#"> Polyester<span>(3)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="compositions"/>
                                    <span></span>
                                </label>
                                <a href="#"> Viscose<span>(2)</span></a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- SINGLE SIDEBAR COMPOSITIONS END -->
                    <!-- SINGLE SIDEBAR STYLES START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Styles</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="styles"/>
                                    <span></span>
                                </label>
                                <a href="#">Casual<span>(5)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="styles"/>
                                    <span></span>
                                </label>
                                <a href="#">Dressy<span>(1)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="styles"/>
                                    <span></span>
                                </label>
                                <a href="#">Girly<span>(7)</span></a>
                            </li>
                        </ul>
                    </div>	 --}}
                    <!-- SINGLE SIDEBAR STYLES END -->
                    <!-- SINGLE SIDEBAR PROPERTIES START -->
                    {{-- <div class="product-single-sidebar">
                        <span class="sidebar-title">Properties</span>
                        <ul>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="properties"/>
                                    <span></span>
                                </label>
                                <a href="#">Colorful Dress<span>(4)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="properties"/>
                                    <span></span>
                                </label>
                                <a href="#">Maxi Dress <span>(1)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="properties"/>
                                    <span></span>
                                </label>
                                <a href="#">Midi Dress<span>(2)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="properties"/>
                                    <span></span>
                                </label>
                                <a href="#">Short Dress<span>(2)</span></a>
                            </li>
                            <li>
                                <label class="cheker">
                                    <input type="checkbox" name="properties"/>
                                    <span></span>
                                </label>
                                <a href="#"> Short Sleeve<span>(4)</span></a>
                            </li>
                        </ul>
                    </div>	 --}}
                    <!-- SINGLE SIDEBAR PROPERTIES END -->
                </div>
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
                            <span class="count-product">There are 13 products.</span>
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
                                            <option value="lowest" {{ !empty($sort_by)&&$sort_by=="lowest" ? "selected" : '' }}>Price: Lowest first</option>
                                            <option value="highest" {{ !empty($sort_by)&&$sort_by=="highest" ? "selected" : '' }}>Price: Highest first</option>
                                            <option value="ascending" {{ !empty($sort_by)&&$sort_by=="ascending" ? "selected" : '' }}>Product Name: A to Z</option>
                                            <option value="descending" {{ !empty($sort_by)&&$sort_by=="descending" ? "selected" : '' }}>Product Name: Z to A</option>
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
                                        <a href="single-product.html"><img src="{{  asset($product->thumbnail) }}" width="189.375" height="189.375" alt="product-image" /></a>
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
                                                                   
                                                                        <span class="price">{{ number_format($product->price) }} VNĐ</span>
                                                                    
                                                                    
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