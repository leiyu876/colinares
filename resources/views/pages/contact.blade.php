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
						<h3>Send us a message(under construction :())</h3>
					</div>		
					<form role="form">
						<div class="form-group">						
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div>
						
						<textarea class="form-control" rows="8"></textarea>
						<!--<button type="submit" class="btn btn-default">Submit</button>-->
					</form>
				</div>
				
				<div class="col-lg-6">
					<div class="recent">
						<h3>Get in touch with us</h3>
					</div>
					<div class="">
						<p>Pedro: <i> Manong bat ang liit liit mo?</i></p>
						<p>Manong <i>Unano: Kasi baby pa lang ako nang ako ay mawalan ng magulang.</i></p>
						<p>Pedro: <i>E ano naman ang koneksyon nunsa pagiging maliit mo?</i></p>
						<p>Manong <i>Unano: Tanga ka ba? ehh di walang nag palaki sakin.</i></p>
						
						<h4>Address:</h4>Sacred Heart Village, Corazon Catmon Cebu, Philippines<br>
						<h4>Telephone:</h4>I dont have :)</br>
						<h4>Facebook:</h4>https://www.facebook.com/leiyu876
					</div>										
				</div>			
			</div>
		</div>
		
@endsection