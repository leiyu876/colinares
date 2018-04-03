@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Tree</h2>
	</div>

		<div class="container">
			<div class="row">
				<div class="col-md-3" style="margin-bottom: 20px; text-align: right">
					<div style="height: 281.7px;">
						<p>{{ $root->first_name }}</p>
						<p>12/12/2018</p>
					</div>
					<div style="height: 281.7px;">
						<p>{{ $root->partner() ? $root->partner()->first_name : ''}}</p>
						<p>12/12/2018</p>
					</div>
				</div>
				<div class="col-md-3" style="margin-bottom: 20px">
					<img src="{{ asset('images/primary/'.( $root->photo ? $root->photo : 'noimage.png' )) }}" style="width: 100%; margin-bottom: 19.2px">
					<img src="{{ asset('images/primary/'.( $root->partner() ? ( $root->partner()->photo ? $root->partner()->photo : 'noimage.png' ) : 'noimage.png' )) }}" style="width: 100%; margin-bottom: 19.2px">
				</div>	
				<div class="col-md-3" style="margin-bottom: 20px">
					<img src="{{ asset('images/primary/1522662947.jpg') }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px">
					<img src="{{ asset('images/primary/1522662947.jpg') }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px">
					<img src="{{ asset('images/primary/1522662947.jpg') }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px">
				</div>	
				<div class="col-md-3" style="margin-bottom: 20px">
					<div style="height: 281.7px;">child1</div>
					<div style="height: 281.7px;">child2</div>
					<div style="height: 281.7px;">child3</div>
				</div>	
			</div>
		</div>
		
@endsection