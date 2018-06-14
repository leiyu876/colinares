@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>{{ $movie->title }}</h2> Best view in mobile.
	</div>

	<div class="container">
		
		<div class="row" >
			<div class="col-md-12">
				@if($movie->is_embedded)
					<iframe style=" width: 100%    !important; height: 100%   !important;" src="{{ $movie->embedded_link }}" frameborder="0" allowfullscreen></iframe>
				@else
					<video controls controlsList="nodownload" style=" width: 100%    !important; height: auto   !important;">
		              <source src="{{ asset('storage/'.$movie->video) }}" type="video/mp4">
		              <source src="{{ asset('storage/'.$movie->video) }}" type="video/ogg">
		            Your browser does not support the video tag.
		            </video>
	            @endif
	            <h6 style="color: gray" class="pull-right">{{ $movie->visited }} views - {{ $movie->created_at->diffForHumans() }}</h6>
			</div>	
		</div>
		<div class="fb-like" data-href="{{ route('movies.single', ['slug' => $movie->slug]) }}" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
		<div class="row" style="text-align: center;">
			<div class="fb-comments" data-href="{{ route('movies.single', ['slug' => $movie->slug]) }}" data-numposts="10"></div>
		</div>
	</div>
		
@endsection