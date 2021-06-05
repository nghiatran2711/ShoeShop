		<!-- HEADER-TOP START -->
		<div class="header-top">
			<div class="container">
				<div class="row">
					<!-- HEADER-LEFT-MENU START -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="header-left-menu">
							<div class="welcome-info">
								@auth
									Xin chào <span>{{ Auth::user()->name }}</span>
								@endauth
								
							</div>
							{{-- <div class="currenty-converter">
								<form method="post" action="#" id="currency-set">
									<div class="current-currency">
										<span class="cur-label">Currency : </span><strong>USD</strong>
									</div>
									<ul class="currency-list currency-toogle">
										<li>
											<a title="Dollar (USD)" href="#">Dollar (USD)</a>
										</li>
										<li>
										<a title="Euro (EUR)" href="#">Euro (EUR)</a>
										</li>
									</ul>
								</form>									
							</div> --}}
							{{-- <div class="selected-language">
								<div class="current-lang">
									<span class="current-lang-label">Language : </span><strong>English</strong>
								</div>
								<ul class="languages-choose language-toogle">
									<li>
										<a href="#" title="English">
											<span>English</span>
										</a>
									</li>
									<li>
										<a href="#" title="Français (French)">
											<span>Français</span>
										</a>
									</li>
								</ul>										
							</div> --}}
						</div>
					</div>
					<!-- HEADER-LEFT-MENU END -->
					<!-- HEADER-RIGHT-MENU START -->
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="header-right-menu">
							<nav>
								<ul class="list-inline">
									{{-- <li><a href="checkout.html">Check Out</a></li> --}}
									{{-- <li><a href="wishlist.html">Wishlist</a></li> --}}
									@auth
										<li><a href="{{ route('view_order_history') }}">Lịch sử mua hàng</a></li>
										<li><a href="{{ route('view_profile') }}">Thông tin cá nhân</a></li>
									@endauth
									<li><a href="{{ route('view_cart') }}">Giỏ hàng</a></li>
                                    @auth

											<li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Đăng xuất</a>
												<form action="{{ route('logout') }}" id="logout-form" method="POST">@csrf</form>
											{{-- <form action="{{ route('logout') }}" method="POST">
												@csrf
												<button class="btn btn-dark" style="background-color: #363636; color:#fff;" type="submit">Logout</button>
											</form>	 --}}
                                    @else
                                        @if (Route::has('login'))
                                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                        @endif
                                        @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">Đăng ký</a></li>
                                        @endif
                                    @endauth
								</ul>									
							</nav>
						</div>
					</div>
					<!-- HEADER-RIGHT-MENU END -->
				</div>
			</div>
		</div>
		<!-- HEADER-TOP END -->
		<!-- HEADER-MIDDLE START -->
		<section class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<!-- LOGO START -->
						<div class="logo">
							<a href="index.html"><img src="{{ asset('frontend/img/logo2.png') }}" alt="bstore logo" /></a>
						</div>
						<!-- LOGO END -->
						<!-- HEADER-RIGHT-CALLUS START -->
						<div class="header-right-callus">
							<h3>call us free</h3>
							<span>0123-456-789</span>
						</div>
						<!-- HEADER-RIGHT-CALLUS END -->
						<!-- CATEGORYS-PRODUCT-SEARCH START -->
						<div class="categorys-product-search">
							<form action="{{ route('search_product') }}" method="get" class="search-form-cat">
								<div class="search-product form-group">
									<select name="catsearch" class="cat-search">
										<option value="">Loại sản phẩm</option>
										@foreach ($categories as $category )
											<option value="{{ $category->id }}" disabled style="font-weight: bold">{{ $category->name }}</option>
											@foreach ($category->childs as $child )
												<option value="{{ $child->id }}" {{ !empty($category_id) && $category_id==$child->id ? "selected" : '' }}>--{{ $child->name }}</option>	
											@endforeach
										@endforeach
																		
									</select>
									<input type="text" class="form-control search-form" name="keyword" placeholder="Nhập tên sản phẩm ... " value="{{ request()->input('keyword') }}"/>
									<button class="search-button" type="submit">
										<i class="fa fa-search"></i>
									</button>									 
								</div>
							</form>
						</div>
						<!-- CATEGORYS-PRODUCT-SEARCH END -->
					</div>
				</div>
			</div>
		</section>
		<!-- HEADER-MIDDLE END -->