@extends('layouts.auth')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $page_title }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('agencies.store') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
          
         	<div class="box-body">
          	<div class="alert alert-info">
                <h4><i class="icon fa fa-info"></i> Notification!</h4>
                <ul>
                  <li>It will take 4 to 6 minutes.</li>
                  <li>Retrieve updated agencies from POEA website.</li>
                  <li>Only valid agencies will be retrieve.</li>
                </ul>
            </div>
          </div>

	        <div class="box-footer">
	        	<a href="{{ url('agencies') }}" class="btn btn-default">Cancel</a>
	        	<button type="submit" class="btn btn-primary pull-right">Proceed</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

@endsection()