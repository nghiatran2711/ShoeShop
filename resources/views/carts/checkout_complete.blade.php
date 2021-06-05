@extends('layouts.master')
@section('content')
{{-- show message --}}
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="{{ route('index') }}">Trang chủ</a>
                    <span><i class="fa fa-caret-right	"></i></span>
                    <span>Hoàn thành đặt hàng</span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <p>Đặt hàng thành công. Cảm ơn quý khách đã mua hàng !!!</p>
       
    </div>
</section>
@endsection