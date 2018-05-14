@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Movies</h2>
	</div>

	<div class="container">
		<div class="row" >
			<div class="col-sm-9">			
			    <div class="form-group row">
				    <label for="movies_sort_by" class="col-sm-2 col-form-label" style="margin-top: 5px">Sort by</label>
				    <div class="col-sm-3">
				      	<select name="category" class="form-control" id="movies_sort_by" onchange="this.form.submit()">
					    	<option {{ $category == 'upload' ? 'selected' : ''}} value="upload">Recent Uploads</option>
					    	<option {{ $category == 'view' ? 'selected' : ''}} value="view">Most Viewed</option>				      
					      	<option {{ $category == 'release' ? 'selected' : ''}} value="release">Date Released</option>
					    </select>
				    </div>
				    <div class="col-sm-5">
				    	{{ Form::text('search_string', null, ['class'=>'form-control', 'placeholder'=>'Search here']) }}
				    </div>
				    <div class="col-sm-2">
					    <button type="button" class="btn btn-primary" id="search_button">Search</button>
					</div>
				</div>
				<div class="row" >
					@foreach($movies as $movie)				
						<a href="{{ route('movies.single', $movie->slug) }}" title="{{ $movie->title }}">						
							<div class="col-sm-4" style="padding: 15px">
								<img src="{{ asset('storage/'.displayImage($movie->image)) }}" width="260" height="200">
								<h4>{{ strlen($movie->title) > 25 ? substr($movie->title, 0, 25).'...' : $movie->title }}</h4>
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

@section('js')
	<script type="text/javascript">
		$('#search_button').click(function (){
			search_string = $('input[name=search_string]').val();
			category = $('select[name=category]').val();
			url = "{{ route('movies.category', ['category' => 'category_input', 'search_string' => 'search_string_input']) }}";
			url = url.replace("category_input", category);
			window.location.replace(url);
		});
	</script>
@endsection