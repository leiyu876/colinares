@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Events</h2>
	</div>
	
	<div class="events">
		<div class="container">
			<div class="col-md-4">
				<div class="slider">
					<div class="img-responsive">
						<ul class="bxslider">				
							<li><img src="{{ asset('guest/img/1.jpg') }}" alt=""/></li>								
							<li><img src="{{ asset('guest/img/2.jpg') }}" alt=""/></li>	
							<li><img src="{{ asset('guest/img/3.jpg') }}" alt=""/></li>			
						</ul>
					</div>	
				</div>
			</div>
			<div class="col-md-8">
				<h2>Jessa's 5th Birthday</h2>
				Sunday, September 26th at 7:00 pm
				<p>
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				<br>			
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				</p>		
			</div>
		</div>
		
		<div class="container">
			<div class="col-md-4">
				<div class="slider">
					<div class="img-responsive">
						<ul class="bxslider">				
							<li><img src="{{ asset('guest/img/3.jpg') }}" alt=""/></li>								
							<li><img src="{{ asset('guest/img/2.jpg') }}" alt=""/></li>	
							<li><img src="{{ asset('guest/img/1.jpg') }}" alt=""/></li>			
						</ul>
					</div>	
				</div>
			</div>
			<div class="col-md-8">
				<h2>Jessica's 5th Birthday</h2>
				Sunday, September 26th at 7:00 pm
				<p>
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				<br>			
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
				excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
				</p>
			</div>
		</div>
		<div class="jessa">
			<div class="container">
				<div class="col-md-4">
					<div class="slider">
						<div class="img-responsive">
							<ul class="bxslider">				
								<li><img src="{{ asset('guest/img/2.jpg') }}" alt=""/></li>								
								<li><img src="{{ asset('guest/img/3.jpg') }}" alt=""/></li>	
								<li><img src="{{ asset('guest/img/1.jpg') }}" alt=""/></li>			
							</ul>
						</div>	
					</div>
				</div>				
				<div class="col-md-8">
					<h2>James 5th Birthday</h2>
					Sunday, September 26th at 7:00 pm
					<p>
					praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
					excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
					praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
					excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
					<br>			
					praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
					excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
					praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
					excepturi sint Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
					</p>
				</div>				
			</div>	
		</div>
	</div>	
	<div class="container">
		<nav>
			<ul class="pagination">
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
			<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
			<li><a href="#">2 <span class="sr-only">(current)</span></a></li>
			<li><a href="#">3 <span class="sr-only">(current)</span></a></li>
			<li><a href="#">4 <span class="sr-only">(current)</span></a></li>
			</ul>
		</nav>
	</div>
@endsection