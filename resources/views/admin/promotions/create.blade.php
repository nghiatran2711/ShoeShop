@extends('admin.layouts.master')
@push('js')
    @php
    // set Begin Date 1
        $beginDate = date('Y-m-d 00:00:00', strtotime($beginDate));
        // set Begin Date 2
        $endDate = date('Y-m-d H:i:s', strtotime($beginDate . ' + 1 months'));
        // dd($beginDate2);
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate . ' - 1 days'));
    @endphp
    <script type="text/javascript">
        var beginDate = "{{ $beginDate }}";
        var endDate = "{{ $endDate }}";
    </script>
    <script type="text/javascript" src="{{ asset('backend/js/promotions/promotion-create.js') }}"></script>
@endpush
@section('content')
    <div class="header"> 
        <h1 class="page-header">
            Promotion <small>Best form elements.</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Promotion</a></li>
            <li class="active">create promotion</li>
        </ol> 							
	</div>
    <div id="page-inner"> 
        <div class="row">
         <div class="col-xs-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <div class="card-title">
                         <div class="title">Create promotion</div>
                     </div>
                     {{-- <div class="card-title">
                        <a href="{{ route('admin.promotion.index') }}" class="btn btn-primary">List Promotion</a>
                    </div> --}}
                 </div>
                 <div class="panel-body">
                    {{-- <form action="{{ route('admin.promotion.store',) }}" method="POST">
                      @csrf
                      <div class="sub-title">Discount</div>
                      <div>
                          <input type="number" name="discount" class="form-control" placeholder="Discount" max="100">
                      </div>
                      <div class="sub-title">Date begin</div>
                      <div>
                          <input type="date" name="begin_date" class="form-control" placeholder="Begin date">
                      </div>
                      <div class="sub-title">Date end</div>
                      <div>
                          <input type="date" name="end_date" class="form-control" placeholder="End date">
                      </div>
                      <div class="sub-title">Status</div>
                        <div>
                            <div class="radio3 radio-check radio-inline">
                                <input type="radio" id="radio4" name="status" value="1" checked="">
                                <label for="radio4">
                                Active
                                </label>
                            </div>
                            <div class="radio3 radio-check radio-success radio-inline">
                                <input type="radio" id="radio5" name="status" value="0">
                                <label for="radio5">
                                Don't Active
                                </label>
                            </div>
                        </div><br>
                      <div>
                          <button type="submit" class="btn btn-default">Store</button>
                      </div>
                    </form> --}}
                    <form action="{{ route('admin.promotion.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="promotion name" value="{{ old('name') }}" class="form-control" required>
                            </div>
                            <div class="col-xs-6">
                                <label for="">Discount</label>
                            <input type="number" name="discount" placeholder="discount" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" placeholder="quantity" class="form-control" required>
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
                                <input type="text" name="begin_date" placeholder="Begin Date" class="form-control dt-begin-date">
                            </div>
                            <div class="col-xs-6">
                                <label for="">End Date</label>
                                <input type="text" name="end_date" placeholder="End Date" class="form-control dt-end-date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <label for="">List Product</label>
                                  <select class="form-control select2-list-product" name="list_product[]" multiple="multiple">
                                    @foreach ($products as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
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