@extends('layouts.master')
@section('content')
{{-- show message --}}
@if(Session::has('success'))
<script>
    alert(Session::get('success'))
</script>
@endif
    <h1>Mã đơn hàng là {{ $order_id }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Thumbnail</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total=0;
            @endphp
            @foreach ($data_view_order as $key =>$value )
                <tr>
                    <td scope="row">{{ $key+1 }}</td>
                    <td><img src="{{ asset($value['thumbnail']) }}" alt="" width="60" height="60"></td>
                    <td>{{ $value['size'] }}</td>
                    <td>{{ $value['price'] }}</td>
                   
                    <td>{{ $value['quantity'] }}</td>
                    @php
                        $money = $value['price'] * $value['quantity'];
                    @endphp
                    <td>{{ number_format($money) . ' VND' }}</td>
                </tr>
                @php
                    $total+=$money;
                @endphp
                @endforeach
                
        </tbody>
    </table>
    Tổng tiền là: {{ $total }}
@endsection