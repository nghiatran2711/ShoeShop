@if (Auth::guard('admin')->user()->role_id==1)
    <nav style="max-height: 550px;overflow-y: scroll; " class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a class="{{ Route::current()->getName() == 'admin.dashboard' ? 'active-menu' : ''  }}  " href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
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
                    <a href="#" class="{{ Route::current()->getName() == 'admin.size.create' || Route::current()->getName() == 'admin.size.index' || Route::current()->getName() == 'admin.size.edit' ? 'active-menu' : ''  }}"><i class="fa fa-sitemap"></i>Sizes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.size.create') }}">Create Sizes</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.size.index') }}">List Sizes</a>
                        </li>
                    </ul>
                </li>	
                <li>
                    <a href="#" class="{{ Route::current()->getName() == 'admin.product.create' || Route::current()->getName() == 'admin.product.index' || Route::current()->getName() == 'admin.product.edit' ? 'active-menu' : ''  }}"><i class="fa fa-sitemap"></i>Products<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.product.create') }}">Create Products</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.product.index') }}">List Products</a>
                        </li>
                    </ul>
                </li>	
                <li>
                    <a href="#" class="{{ Route::current()->getName() == 'admin.promotion.create' || Route::current()->getName() == 'admin.promotion.index' || Route::current()->getName() == 'admin.promotion.edit' ? 'active-menu' : ''  }}"><i class="fa fa-sitemap"></i>Promotions<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        {{-- <li>
                            <a href="{{ route('admin.promotion.create') }}">Create Promotions</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('admin.promotion.index') }}">List promotions</a>
                        </li>
                    </ul>
                </li>	
                <li>
                    <a href="#" class=""><i class="fa fa-sitemap"></i>Orders<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.order.list_order') }}">List orders</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('admin.order.report_order') }}">Report orders</a>
                        </li> --}}
                    </ul>
                </li>	
                <li>
                    <a href="#" class=""><i class="fa fa-sitemap"></i>Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.user.list_user') }}">List users</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class=""><i class="fa fa-sitemap"></i>Customers<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('admin.customer.list_customer') }}">List customers</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
@else
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a class="{{ Route::current()->getName() == 'admin.dashboard' ? 'active-menu' : ''  }}  " href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="#" class=""><i class="fa fa-sitemap"></i>Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('admin.order.list_order_shipping') }}">List order shipping</a>
                    </li>
                </ul>
            </li>	
        </ul>
    </div>
</nav>
@endif
        <!-- /. NAV SIDE  -->