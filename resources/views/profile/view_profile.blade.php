@extends('layouts.master')
@section('content')
    <!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">HOMe</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Info profile</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					{{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Sign in</h2>
					</div> --}}
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- REGISTERED-ACCOUNT START -->
                        <div class="col-lg-4 col-lg-offset-4">
                            <div class="primari-box registered-account">
                                <h1>Thông tin cá nhân</h1>
                                @include('admin.errors.error')
                                <p>Họ và tên: {{ Auth::user()->name }}</p>
                                <p>Email: {{ Auth::user()->email}}</p>
                                <p>Địa chỉ: {{ Auth::user()->address }}</p>
                                <p>Số điện thoại: {{ Auth::user()->phone }}</p>		
                            </div>
                            <!-- REGISTERED-ACCOUNT END -->
                        </div>
                        <div class="col-lg-4 col-lg-offset-4">
                            <a href="{{ route('edit_profile') }}" class="btn btn-info">Chỉnh sửa thông tin cá nhân</a>
                            <a href="{{ route('change_password') }}" class="btn btn-warning">Đổi mật khẩu</a>
                        </div>
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
@endsection
