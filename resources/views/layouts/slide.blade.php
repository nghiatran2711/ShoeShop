<!-- HEADER-BOTTOM-AREA START -->
		<section class="header-bottom-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- LEFT-CATEGORY-MENU START -->
						<div class="left-category-menu">
							<div class="left-product-cat">
								<div class="category-heading">
									<h2>Thương hiệu</h2>
								</div>
								<!-- CATEGORY-MENU-LIST START -->
								<div class="category-menu-list">
									<ul>
                                        @foreach ($brands as $key=>$value )  
										    <li><a href="{{ route('product_by_brand',['id'=>$value->name]) }}"><span class="cat-thumb hidden-md hidden-sm hidden-xs"><img src="img/layout2/4.png" alt="" /></span>{{ $value->name }}</a>
										</li>   
                                        @endforeach
									</ul>
								</div>
								<!-- CATEGORY-MENU-LIST END -->
							</div>
						</div>	
						<!-- LEFT-CATEGORY-MENU END -->			
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- MAIN-SLIDER-AREA START -->
						<div class="main-slider-area">
							<div class="slider-area">
								<div id="wrapper">
									<div class="slider-wrapper">
										<div id="mainSlider" class="nivoSlider">
											<img src="{{ asset('frontend/img/slider/homepage2/3.jpg') }}" alt="main slider" title="#htmlcaption"/>
											<img src="{{ asset('frontend/img/slider/homepage2/4.jpg') }}" alt="main slider" title="#htmlcaption2"/>
										</div>
										<div id="htmlcaption" class="nivo-html-caption slider-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text1">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">BEST THEMES</h2>
													<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>	
													<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>													
												</div>
											</div>	
										</div>
										<div id="htmlcaption2" class="nivo-html-caption">
											<div class="slider-progress"></div>
											<div class="slider-cap-text slider-text2">
												<div class="d-table-cell">
													<h2 class="animated bounceInDown">BEST THEMES</h2>
													<p class="animated bounceInUp">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod ut laoreet dolore magna aliquam erat volutpat.</p>	
													<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Read More <i class="fa fa-caret-right"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>											
						</div>	
						<!-- MAIN-SLIDER-AREA END -->
					</div>						
				</div>
			</div>
		</section>
		<!-- HEADER-BOTTOM-AREA END -->