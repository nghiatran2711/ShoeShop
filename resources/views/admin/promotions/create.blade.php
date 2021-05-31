@extends('admin.layouts.master')
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
                     <div class="card-title">
                        <a href="{{ route('admin.promotion.index') }}" class="btn btn-primary">List Promotion</a>
                    </div>
                 </div>
                 <div class="panel-body">
                    <form action="{{ route('admin.promotion.store',) }}" method="POST">
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
                    </form>
                 </div>
             </div>
         </div>
     </div>

        <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez.com</a></p></footer>
    </div>
@endsection