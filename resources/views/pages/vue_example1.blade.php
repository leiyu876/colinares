@extends('layouts.auth')

@section('content')
	<div id="app">
		
		<section class="content">

	    <!-- Default box -->
		    <div class="box">
		      <div class="box-header with-border">
		        <h3 class="box-title"></h3>
		      </div>
		      <div class="box-body">
		        <vue-example1 formpost="{{ route("vue_example1") }}"></vue-example1>        
		      </div>
		      <!-- /.box-footer-->
		    </div>
		    <!-- /.box -->

	  </section>
	</div>
@endsection()
@section('js')
	<script src="{{ asset('js/app.js') }}"></script>	
@endsection()