{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
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
							<span>Reset Password</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Reset Password</h2>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- REGISTERED-ACCOUNT START -->
                        <div class="col-lg-4 col-lg-offset-4">
                            <div class="primari-box registered-account">
                                    <h4 class="box-subheading">Reset Pasword</h4>
                                    @if(Session::has('status'))
                                            <p class="text-success">{{ Session::get('status') }}</p>
                                        @endif
                                        @if(Session::has('errors'))
                                            <p class="text-danger">{{ Session::get('errors') }}</p>
                                        @endif
                                <form class="new-account-box" action="{{ route('password.update') }}" id="accountLogin" method="POST">
                                   @csrf 
                                   <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="form-content">
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Email</label>
                                            <input type="text" value="{{ old('email', $request->email) }}" name="email" id="loginemail" class="form-control input-feild" required autofocus>
                                        </div>
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Password</label>
                                            <input type="password" value="" name="password" id="loginemail" class="form-control input-feild" required>
                                        </div>
                                        <div class="form-group primary-form-group">
                                            <label for="loginemail">Confirm Password</label>
                                            <input type="password" value="" name="password_confirmation" id="loginemail" class="form-control input-feild" required>
                                        </div>
                                        <div class="submit-button">
                                            <button class="btn btn-danger" type="submit"><i class="fa fa-link"></i> Reset Password</button>
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

