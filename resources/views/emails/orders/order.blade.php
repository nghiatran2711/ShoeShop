<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>A responsive two column example</title>
    	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
	  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
	  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <style>
        /* A simple css reset */
        /* Add some padding for small screens */
        .wrapper {
            padding-left: 10px;
            padding-right: 10px;
        }

        .center {
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
		  width: 50%;
		}

        @media only screen and (max-width: 620px) {

            .wrapper .section {
                width: 100%;
            }

            .wrapper .column {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body>
    <table width="100%">
        <tbody>
            <tr>
                <td class="wrapper" width="600px" align="center">
                    <!-- Header image -->
                    <table class="section header" cellpadding="0" cellspacing="0" width="690px">
                        <tr>
                            <td class="column">
                                <img src="{{ $message->embed(public_path().'/frontend/img/logo2.png') }} {{-- asset('frontend/img/logo2.png') --}}" alt="" class="center">
                                <h2 class="center" style="text-align: center;">Thanks for your order</h2>
                            </td>
                        </tr>
                    </table>

                    <!-- Two columns -->
                    <table class="section" cellpadding="0" cellspacing="0" width="690px">
                    	<tr>
                    		<td><h5>Xin chào {{ $info_order->name }}</h5></td>
                    	</tr>
                        <tr>
                            <td class="column" width="290px" valign="top" style="border: 1px solid black;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                            	<b style="font-size: 18px; font-family:sans-serif;">&nbsp;Tóm tắt:</b><br>
                                            	<b>&nbsp;Mã đơn hàng: {{ $info_order->id }}</b><br>
                                            	<b>&nbsp;Ngày đặt: {{ $info_order->created_at }}</b><br>
                                            	{{-- <b>&nbsp;Tổng hoá đơn: 1,000,000 VNĐ</b><br> --}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="column" width="290px" valign="top" style="border: 1px solid black; border-collapse:collapse;">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                            	<b style="font-size: 18px; font-family:sans-serif;">&nbsp;Thông tin giao hàng:</b><br>
                                            	<b>&nbsp;Họ và tên: {{ $info_order->name }}</b><br>
                                            	<b>&nbsp;Địa chỉ: {{ $info_order->address }}</b><br>
                                            	<b>&nbsp;Số điện thoại: 0{{ $info_order->phone }}</b><br>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table class="section" cellpadding="0" cellspacing="0" width="690px">
                        <tr>
                            <td width="690px" valign="top">
                                <table width="100%" style="text-align: center;border:solid 1px black;border-collapse: collapse;">
								    <thead style="border: 1px solid black; border-collapse:collapse;">
								      <tr>
								      	<th>#</th>
								      	<th>Hình ảnh</th>
								        <th>Tên sản phẩm</th>
                                        <th>kích cỡ</th>
								        <th>Số lượng</th>
								        <th>Giá</th>
                                        <th>Thành tiền</th>
								      </tr>
								    </thead>
								    
								    <tbody style="border: 1px solid black; border-collapse:collapse;">
                                        @php
                                            $total=0;
                                        @endphp
                                        @if (!empty($order_details))
                                            @foreach ($order_details as $key =>$order_detail )
                                                <tr style="border: 1px solid black; border-collapse:collapse;">
                                                    <td>{{ $key+1 }}</td>
                                                    <td><img src="{{ $message->embed(public_path().'/'.$order_detail->thumbnail) }}" alt="" width="80px"></td>
                                                    <td>{{ $order_detail->product_name }}</td>
                                                    <td>Size: {{ $order_detail->size_name }}</td>
                                                    <td>{{ $order_detail->quantity }}</td>
                                                    <td>

                                                        @if ($order_detail->discount==Null)
                                                            <b style="color: red;">{{ number_format($order_detail->price).' '.'VNĐ' }}</b>
                                                        @else
                                                            @php
                                                                $price_discount=$order_detail->discount * $order_detail->price/100;
                                                                $price_new=$order_detail->price-$price_discount;
                                                            @endphp
                                                                <b style="color: red;">{{ number_format($price_new).' '.'VNĐ' }}</b><br>
                                                                <del>{{ number_format($order_detail->price).' '.'VNĐ' }}</del>

                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($order_detail->discount=='')
                                                        @php
                                                            $subtotal=$order_detail->price* $order_detail->quantity;
                                                        @endphp
                                                            <span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span>
                                                        @else
                                                            @php
                                                                $subtotal=$price_new * $order_detail->quantity;
                                                            @endphp
                                                            <span class="price">{{ number_format($subtotal).' '.'VNĐ' }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php
                                                     $total+=$subtotal;
                                                @endphp
                                        @endforeach
                                    @endif
								    </tbody>
                                    <tfoot style="border: 1px solid black; border-collapse:collapse;">
								    	<tr>
								    		<td></td>
								    		<td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
								    		<td colspan="2"><b>Tổng tiền: {{ number_format($total).' '.'VNĐ' }}<b></td>
								    	</tr>
								    </tfoot>
								  </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>