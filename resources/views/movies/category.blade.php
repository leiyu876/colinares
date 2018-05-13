@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Movies</h2>
	</div>

	<div class="container">
		
		<div class="row" >
			@foreach($movies as $movie)
				<a href="{{ route('movies.single', $movie->slug) }}">
					<div class="col-md-4" style="padding: 15px">
						<img src="{{ asset('storage/'.displayImage($movie->image)) }}" width="360" height="309.23">
						<h3>{{ $movie->title }}</h3>
					</div>	
				</a>
			@endforeach
		</div>
		<div class="row" style="text-align: center;">{{ $movies->links() }}</div>
	</div>
		
@endsection