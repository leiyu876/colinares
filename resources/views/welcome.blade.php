@extends('layouts.guest')

@section('content')
	<div class="slider">
		<div class="img-responsive">
			<ul class="bxslider">				
				<li><img src="{{ asset('guest/img/orange/c1.jpg') }}" alt=""/></li>								
				<li><img src="{{ asset('guest/img/orange/c2.jpg') }}" alt=""/></li>	
				<li><img src="{{ asset('guest/img/orange/c3.jpg') }}" alt=""/></li>			
			</ul>
		</div>	
    </div>
	
	<div class="jumbotron">
		<h1>My Family</h1>
		<p>
		praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
		excepturi sint <br>
		Voluptatem accusantium doloremque laudantium sprea totam rem aperiam
		</p>
	</div>
	
	<div class="container">
		<div class="col-md-6" >
			<img src="{{ asset('guest/img/orange/c5.jpg') }}" alt="" class="img-responsive" />
		</div>
		<div class="col-md-6" >
			<img src="{{ asset('guest/img/orange/c6.jpg') }}" alt="" class="img-responsive" />
		</div>
	</div>
	<section class="box">
		<div class="container">
			<div class="row">				
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
						<div class="services">											
							<div class="icons">
								<i class="fa fa-heart-o fa-3x"></i>
							</div>
							<h4>Events</h4>	
							<p>
							praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
							excepturi sint occaecati cupiditate non provident
							</p>
						</div>
					</div>
					<hr>
				</div>
				
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.8s">
						<div class="services">											
							<div class="icons">
								<i class="fa fa-desktop fa-3x"></i>
							</div>
							<h4>Fresh</h4>
							<p>
							praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
							excepturi sint occaecati cupiditate non provident
							</p>							
						</div>
					</div>
					<hr>
				</div>
				
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.2s">
						<div class="services">												
							<div class="icons">
								<i class="fa fa-thumbs-o-up fa-3x"></i>
							</div>
							<h4>likes</h4>
							<p>
							praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
							excepturi sint occaecati cupiditate non provident
							</p>							
						</div>
					</div>
					<hr>
				</div>
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
						<div class="services">											
							<div class="icons">
								<i class="fa fa-leaf fa-3x"></i>
							</div>
							<h4>Business Family</h4>	
							<p>
							praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
							excepturi sint occaecati cupiditate non provident
							</p>
						</div>						
					</div>
					<hr>
				</div>
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.8s">
						<div class="services">											
							<div class="icons">
								<i class="fa fa-laptop fa-3x"></i>
							</div>
							<h4>Free Support</h4>
							<p>
							praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
							excepturi sint occaecati cupiditate non provident
							</p>							
						</div>
					</div>
					<hr>
				</div>
				<div class="col-md-4">
					<div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.2s">
						<div class="services">												
							<div class="icons">
								<i class="fa fa-camera fa-3x"></i>
							</div>
							<h4>Photography</h4>
							<p>
							praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
							excepturi sint occaecati cupiditate non provident
							</p>							
						</div>
					</div>
					<hr>
				</div>					
			</div>
		</div>
	</section>
	
	<div class="gallery">
		<img src="{{ asset('guest/img/orange/c4.jpg') }}" alt="" class="img-responsive" />		
	</div>
@endsection
	