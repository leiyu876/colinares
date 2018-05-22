@extends('layouts.guest')

@section('css')
	<link rel="stylesheet" href="{{ asset('auth/bower_components/fullcalendar/dist/fullcalendar.min.css') }}">
  	<link rel="stylesheet" href="{{ asset('auth/bower_components/fullcalendar/dist/fullcalendar.print.min.css') }}" media="print">
@endsection

@section('content')
	<div class="breadcrumb">
		<h2>Our Story</h2>
	</div>
	<div class="container">
		<div class="col-md-12" >
			<div id='calendar'></div><br/>
		</div>
	</div>
@endsection

@section('js')
	<script src="{{ asset('auth/bower_components/moment/moment.js') }}"></script>
	<script src="{{ asset('auth/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
	<script type="text/javascript">
		$(function() {
			var date = new Date()
		    var y    = date.getFullYear()
		    var obj = JSON.parse('{!! $users !!}');

		    var e_v = [];

		    for (var key in obj) {

		    	birthday = obj[key].birthday;
		    	var dateParts = birthday.split("-");
		    	var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
		    	var e = [];

			    e['title'] = obj[key].first_name+' '+obj[key].middle_name+' '+obj[key].last_name;
			    e['start'] = new Date(y, dateParts[1] - 1, dateParts[2].substr(0,2));
			    e['backgroundColor'] = '#f56954';
			    e['borderColor'] = '#f56954';

			    e_v[key] = e;
			}

		  	$('#calendar').fullCalendar({

		  		events    : e_v,
		 	})

		});
	</script>
@endsection