@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>{{ $movie->title }}</h2>
	</div>

	<div class="container">
		
		<div class="row" >
			<div class="col-md-3 col-md-offset-1" style="margin-bottom: 20px">
				<video width="960" height="720" controls controlsList="nodownload" style="margin-top: -90px;">
	              <source src="{{ asset('storage/'.$movie->video) }}" type="video/mp4">
	              <source src="{{ asset('storage/'.$movie->video) }}" type="video/ogg">
	            Your browser does not support the video tag.
	            </video>
			</div>	
		</div>
	</div>
		
@endsection