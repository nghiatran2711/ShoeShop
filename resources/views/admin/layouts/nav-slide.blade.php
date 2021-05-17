<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="{{ Route::current()->getName() == 'admin.dashboard' ? 'active-menu' : ''  }}  " href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="ui-elements.html"><i class="fa fa-desktop"></i> UI Elements</a>
                    </li> 
					 
					<li>
                        <a href="#" class="{{ Route::current()->getName() == 'admin.brand.create' || Route::current()->getName() == 'admin.brand.index'|| Route::current()->getName() == 'admin.brand.edit' ? 'active-menu' : ''  }}"><i class="fa fa-sitemap"></i> Brands<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.brand.create') }}">Create Brands</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.brand.index') }}">List Brands</a>
                            </li>
						</ul>
					</li>
                    <li>
                        <a href="#" class="{{ Route::current()->getName() == 'admin.category.create' || Route::current()->getName() == 'admin.category.index' || Route::current()->getName() == 'admin.category.edit' ? 'active-menu' : ''  }}"><i class="fa fa-sitemap"></i>Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('admin.category.create') }}">Create Categories</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.category.index') }}">List Categories</a>
                            </li>
                        </ul>
                    </li>		
							
                    <li>
                        <a href="tab-panel.html"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>
                    
                    <li>
                        <a href="table.html"><i class="fa fa-table"></i> Responsive Tables</a>
                    </li>
                    <li>
                        <a href="form.html"><i class="fa fa-edit"></i> Forms </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->