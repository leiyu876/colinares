@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Movies</h2>
	</div>

	<div class="container">
		<div class="row" >
			<div class="col-sm-9">
				<div class="row" >
					@foreach($movies as $movie)				
						<a href="{{ route('movies.single', $movie->slug) }}">						
							<div class="col-sm-4" style="padding: 15px">
								<img src="{{ asset('storage/'.displayImage($movie->image)) }}" width="260" height="200">
								<h4>{{ $movie->title }}</h4>
								<h6 style="color: gray">{{ $movie->visited }} views - {{ $movie->created_at->diffForHumans() }}</h6> 
							</div>							
						</a>
					@endforeach
				</div>	
			</div>
			<div class="col-sm-3" style="padding: 15px">
				<h5>Request a movie? Comment here.</h5>
					<div class="fb-comments" data-href="{{ url('movies/category') }}" data-numposts="10" data-width="100%"></div>
			</div>	
		</div>
		<div class="row" style="text-align: center;">{{ $movies->links() }}</div>
	</div>
		
@endsection