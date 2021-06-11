@extends('layouts.master')
@section('content')
    <!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">Trang chủ</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Thông tin cá nhân</span>
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
                                <form class="new-account-box" id="accountLogin" method="POST" action="{{ route('update_password',['id'=>Auth::user()->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <h4 class="box-subheading">Đổi mật khẩu</h4>
                                    <div class="form-content">
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Email</label>
                                            <input type="email" value="{{ Auth::user()->email }}" name="email" id="loginemail" class="form-control input-feild" required readonly>
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
 
                                       <div class="form-group primary-form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" value="" name="password" id="password" class="form-control input-feild" required>
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group primary-form-group">
                                            <label for="password">Nhập lại mật khẩu</label>
                                            <input type="password" value="" name="password_confirmation" id="password" class="form-control input-feild" required>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror 
                                        <div class="submit-button">
                                            <button class="btn btn-danger" type="submit"><i class="submit-icon"></i>Đổi mật khẩu</button>
                                        </div>
                                    </div>
                                </form>	
                            </div>
                            <!-- REGISTERED-ACCOUNT END -->
                        </div>
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
@endsection
