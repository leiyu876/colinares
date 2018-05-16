@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>{{ $movie->title }}</h2>
	</div>

	<div class="container">
		
		<div class="row" >
			<div class="col-md-12">
				<video controls controlsList="nodownload" style=" width: 100%    !important; height: auto   !important;">
	              <source src="{{ asset('storage/'.$movie->video) }}" type="video/mp4">
	              <source src="{{ asset('storage/'.$movie->video) }}" type="video/ogg">
	            Your browser does not support the video tag.
	            </video>
			</div>	
		</div>
		<div class="fb-like" data-href="{{ route('movies.single', ['slug' => $movie->slug]) }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
		<div class="row" style="text-align: center;">
			<div class="fb-comments" data-href="{{ route('movies.single', ['slug' => $movie->slug]) }}" data-numposts="10"></div>
		</div>
	</div>
		
@endsection