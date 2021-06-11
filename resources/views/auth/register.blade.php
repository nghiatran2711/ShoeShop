{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
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
							<a href="{{ route('index') }}">Trang chủ</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Đăng ký tài khoản</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
                
				<div class="row">
					{{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Đăng ký tài khoản</h2>
					</div> --}}
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- REGISTERED-ACCOUNT START -->
                        <div class="col-lg-4 col-lg-offset-4">
                            <div class="primari-box registered-account">
                                <form class="new-account-box" id="accountLogin" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <h4 class="box-subheading">Đăng ký tài khoản</h4>
                                    @include('admin.errors.error')
                                    <div class="form-content">
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Họ và tên</label>
                                            <input type="text" value="" name="name" id="loginemail" class="form-control input-feild">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Email</label>
                                            <input type="email" value="" name="email" id="loginemail" class="form-control input-feild">
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Địa chỉ</label>
                                            <input type="text" value="" name="address" id="loginemail" class="form-control input-feild">
                                        </div>
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Số điện thoại</label>
                                            <input type="text" value="" name="phone" id="loginemail" class="form-control input-feild">
                                        </div>
                                        @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group primary-form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" value="" name="password" id="password" class="form-control input-feild">
                                        </div>
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group primary-form-group">
                                            <label for="password">Nhập lại mật khẩu</label>
                                            <input type="password" value="" name="password_confirmation" id="password" class="form-control input-feild">
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="forget-password">
                                            <p><a href="{{ route('login') }}">Đã có tài khoản?</a></p>
                                        </div>
                                        <div class="submit-button">
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-lock submit-icon"></i> Đăng Ký</button>
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