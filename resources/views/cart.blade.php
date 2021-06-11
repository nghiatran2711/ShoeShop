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
							<span><i class="fa fa-caret-right	"></i></span>
							<span>giỏ hàng của bạn</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<section class="list-product">
					@include('carts.table_cart_info')
				</section>
			</div>
		</section>
		@include('carts.parts.modal_send_code')

		{{-- @push('css')
			<link rel="stylesheet" href="{{ asset('css/carts/cart-info.css') }}">
		@endpush --}}

		@push('js')
			<script>
				const URL_CHECKOUT = "{{ route('checkout') }}";
			</script>
			<script src="{{ asset('frontend/js/carts/cart-info.js') }}"></script>
			<script type="text/javascript">
				// function updateCart(){
				// 		$(document).ready(function () {
				// 			$("input[name='quantity']").each(function() {
				// 				rowId=$(this).data('id');
				// 				quantity=$(this).val();
				// 				console.log( rowId + quantity );
				// 				$.ajax({
				// 					type: "GET",
				// 					url: '{{ url('update-cart') }}',
				// 					dataType: 'json',
				// 					data: {rowId:rowId,quantity:quantity},
				// 					success: function (response) {
				// 						window.location.reload();
				// 						console.log('response', response);
				// 						// alert(response.message);
				// 						// console.log(response);
				// 					},
				// 					error: function (err) {
				// 						console.log(err)
				// 					},
				// 				});
				// 			});
				// 			window.location.reload();	
				// 		});
				// }       

				function updateCart(){
					$(document).ready(function () {
						$("input[name='quantity']").each(function() {
							rowId=$(this).data('id');
							quantity=$(this).val();
							console.log( rowId + quantity );
							$.ajax({
								type: "GET",
								url: '{{ url('update-cart') }}',
								dataType: 'json',
								data: {
									rowId:rowId,
									quantity:quantity
								},
								success: function (response) {
									// window.location.reload();
									$('.list-product').html(response.data_table);
								},
								error: function (err) {
									if (err.responseJSON.message) {
										alert(err.responseJSON.message);
									}
								},
							});
						});
						// window.location.reload();
					});
				}     

				// function delete_cart(){
				// 	$(document).ready(function () {
				// 	let url = $(this).attr('action');
				// 	alert(url);
				// 		$.ajax({
				// 			type: "GET",
				// 			url: url,
				// 			dataType: 'json',
				// 			success: function (response) {
				// 				// window.location.reload();
				// 				$('.list-product').html(response.data_table);
				// 			},
				// 			error: function (err) {
				// 				if (err.responseJSON.message) {
				// 					alert(err.responseJSON.message);
				// 				}
				// 			},
				// 			});
				// 	});
				// }
			</script>
		@endpush
		<!-- MAIN-CONTENT-SECTION END -->
@endsection