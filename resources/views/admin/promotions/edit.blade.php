@extends('admin.layouts.master')
@push('js')
    @php
    // set Begin Date
        $begin=date('Y-m-d H:i:s',strtotime($promotion->begin_date));
        $end=date('Y-m-d H:i:s',strtotime($promotion->end_date));
        if (!empty($begin) && !empty($end)) {
            $beginDate = date('Y-m-d 00:00:00', strtotime($begin));
            // set endDate
            $endDate = date('Y-m-d H:i:s', strtotime($end));
        }else {
            $beginDate = date('Y-m-d 00:00:00');
            // set endDate
            $endDate  = date('Y-m-d H:i:s', strtotime($beginDate . ' + 1 months'));
            // dd($endDate);
            $endDate  = date('Y-m-d 23:59:59', strtotime($endDate  . ' - 1 days'));
        }
    @endphp
    <script type="text/javascript">
        var beginDate = "{{ $beginDate }}";
        var endDate = "{{ $endDate }}";
    </script>
    <script type="text/javascript" src="{{ asset('backend/js/promotions/promotion-edit.js') }}"></script>
@endpush
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Promotion <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Promotion</a></li>
            <li class="active">edit promotion</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Edit promotion</div>
                     </div>
                     {{-- <div class="card-title">
                        <a href="{{ route('admin.promotion.index') }}" class="btn btn-primary">List Promotion</a>
                    </div> --}}
                 </div>
                 <div class="panel-body">
                    <form action="{{ route('admin.promotion.update',['id'=>$promotion->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ old('name', $promotion->name) }}" class="form-control" required>
                            </div>
                            <div class="col-xs-6">
                                <label for="">Discount</label>
                            <input type="number" name="discount"  value="{{ old('discount', $promotion->discount) }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" value="{{ old('quantity', $promotion->quantity) }}" class="form-control" required>
                            </div>
                            <div class="col-xs-6">
                                <label for="">Status</label>
                                <br>
                                <input type="checkbox" name="status" placeholder="Status" class="" checked value="1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Begin Date</label>
                                <input type="text" name="begin_date" value="{{ old('begin_date', $promotion->begin_date) }}" class="form-control dt-begin-date">
                            </div>
                            <div class="col-xs-6">
                                <label for="">End Date</label>
                                <input type="text" name="end_date" value="{{ old('end_date', $promotion->end_date) }}" class="form-control dt-end-date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label for="">List Product</label>
                                  <select class="form-control select2-list-product" name="list_product[]" multiple="multiple">
                                    @foreach ($products as $id => $name)
                                        <option value="{{ $id }}" {{ in_array($id, $listProductPromotion) ? 'selected' :'' }}>{{ $name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group mb-2 text-center">
                            <a href="{{ route('admin.promotion.index') }}" class="btn btn-info">List Promotion</a>
                            <button type="submit" class="btn btn-primary">Store</button>
                        </div>
                    </form>
                 </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection