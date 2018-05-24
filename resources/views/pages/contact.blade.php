@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Contact</h2>
	</div>
	<div class="map">
		<iframe src="https://www.google.com/maps/d/embed?mid=1Qrryb_yVZmNJWWBARkHcH81R7CFv_HjZ"></iframe>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="recent">
						<h3>Send us a message</h3>
					</div>		
					<form role="form">
						<div class="form-group">						
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						
						<textarea class="form-control" rows="8"></textarea>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
				
				<div class="col-lg-6">
					<div class="recent">
						<h3>Get in touch with us</h3>
					</div>
					<div class="">
						<p>Nam liber tempor cum soluta nobis eleifend option 
						congue nihil imperdiet doming id quod mazim placerat
						facer possim assum. Typi non habent claritatem insitam;
						est usus legentis in iis qui facit eorum.</p>
						<p>Nam liber tempor cum soluta nobis eleifend option 
						congue nihil imperdiet doming id quod mazim placerat
						facer possim assum. Typi non habent claritatem insitam;
						est usus legentis in iis qui facit eorum.</p>
						
						<h4>Address:</h4>Little Lonsdale St, New York<br>
						<h4>Telephone:</h4>345 578 59 45 416</br>
						<h4>Fax:</h4>123 456 789
					</div>										
				</div>			
			</div>
		</div>
		
@endsection