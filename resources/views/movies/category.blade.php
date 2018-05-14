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
				      	<select name="category" class="form-control" id="movies_sort_by">
					    	<option {{ $category == 'created_at' ? 'selected' : ''}} value="created_at">Recent Uploads</option>
					    	<option {{ $category == 'visited' ? 'selected' : ''}} value="visited">Most Viewed</option>				      
					      	<option {{ $category == 'released_year' ? 'selected' : ''}} value="released_year">Year Released</option>
					    </select>
				    </div>
				    <div class="col-sm-6">
				    	{{ Form::text('search_string', $search_string, ['class'=>'form-control', 'placeholder'=>'Search here']) }}
				    </div>
				    <div class="col-sm-1">
					    <button type="button" class="btn btn-primary pull-right" id="search_button">Search</button>
					</div>
				</div>
				<div class="row">
					@foreach($movies as $movie)				
						<a href="{{ route('movies.single', $movie->slug) }}" title="{{ $movie->title }}">						
							<div class="col-sm-4" style="padding: 15px;">
								<img src="{{ asset('storage/'.displayImage($movie->image)) }}" width="260" height="200">
								<h4>{{ strlen($movie->title) > 25 ? substr($movie->title, 0, 25).'...' : $movie->title }}</h4>
								<h6 style="color: gray">{{ $movie->visited }} views - {{ $movie->created_at->diffForHumans() }}</h6> 
							</div>							
						</a>
					@endforeach
				</div>	
				<div class="row" style="text-align: center;">{{ $movies->links() }}</div>
			</div>
			<div class="col-sm-3" style="padding: 15px">
				<h5>Request a movie? Comment it here.</h5>
					<div class="fb-comments" data-href="{{ url('movies/category') }}" data-numposts="10" data-width="100%"></div>
			</div>	
		</div>		
	</div>
		
@endsection

@section('js')
	<script type="text/javascript">
		$('#search_button').click(function (){
			category = $('select[name=category]').val();
			search_string = $('input[name=search_string]').val();
			url = "{{ route('movies.category', ['category' => 'category_input', 'search_string' => 'search_string_input']) }}";
			url = url.replace("category_input", category);
			url = url.replace("search_string_input", search_string);
			window.location.replace(url);
		});
		$('#movies_sort_by').change(function() {
			$('#search_button').click();
		});
	</script>
@endsection