{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
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
							<span>Quên mật khẩu</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Quên mật khẩu</h2>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- REGISTERED-ACCOUNT START -->
                        <div class="col-lg-4 col-lg-offset-4">
                            <div class="primari-box registered-account">
                                <form class="new-account-box" action="{{ route('password.email') }}" id="accountLogin" method="POST">
                                    @csrf
                                    <h4 class="box-subheading">Quên mật khẩu</h4>
                                    <p>Bạn đã quên mật khẩu? Không vấn đề gì. Chỉ cần cho chúng tôi biết địa chỉ email của bạn chúng tôi sẽ gửi cho bạn một liên kết đặt lại mật khẩu qua email cho phép bạn chọn một mật khẩu mới</p>
                                    <div class="form-content">
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Email</label>
                                            <input type="text" value="" name="email" id="loginemail" class="form-control input-feild">
                                        </div>
                                        <div class="submit-button">
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-link"></i> Nhận liên kết đặt lại mật khẩu</button>
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

