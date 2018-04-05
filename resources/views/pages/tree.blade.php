@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Tree</h2>
	</div>

		<div class="container">
			<div class="row">
				@foreach($breadcrumbs as $breadcrumb)
					<a href="{{ route('pages.tree', ['email' => $breadcrumb->email])}}">
						<img src="{{ asset('images/primary/'.( $breadcrumb->photo ? $breadcrumb->photo : 'noimage.png' )) }}" style="width: 50px; height: 50px; margin-bottom: 19.2px" class="img-rounded" data-toggle="tooltip" title="{{ $breadcrumb->first_name.' '.$breadcrumb->last_name }}">
					</a>
				@endforeach
			</div>
			<div class="row">
				<div class="col-md-3" style="margin-bottom: 20px; text-align: right;">
					<div style="height: 281.7px;">
						<p><strong> {{ $root->first_name }}</strong> : Name</p>
						<p><strong> {{ $root->age }}</strong> : Age</p>
						<p><strong> {{ dateDBtoHuman($root->birthday) }}</strong> : Birthdate</p>
						<p><strong> {{ $root->occupation }}</strong> : Work</p>
					</div>
					<div style="height: 281.7px;">
						<p>{{ $root->partner() ? $root->partner()->first_name : ''}}</p>
						<p>12/12/2018</p>
					</div>
				</div>
				<div class="col-md-3" style="margin-bottom: 20px">
					<img src="{{ asset('images/primary/'.( $root->photo ? $root->photo : 'noimage.png' )) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px">
					<img src="{{ asset('images/primary/'.( $root->partner() ? ( $root->partner()->photo ? $root->partner()->photo : 'noimage.png' ) : 'noimage.png' )) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px">
				</div>	
				<div class="col-md-3" style="margin-bottom: 20px">
					@foreach($root->children() as $child)
						<img src="{{ asset('images/primary/'.( $child->photo ? $child->photo : 'noimage.png' )) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px">
					@endforeach
				</div>	
				<div class="col-md-3" style="margin-bottom: 20px">
					@foreach($root->children() as $child)
						<div style="height: 281.7px;">
							<p> Name : <strong>{{ $child->first_name.' '.$child->last_name }}</strong></p>
							<p> Age : <strong>{{ $child->age }}</strong></p>
							<p> Birthdate : <strong>{{ dateDBtoHuman($child->birthday) }}</strong></p>
							<p> Work : <strong>{{ $child->occupation }}</strong></p>
							<a href="{{ route('pages.tree', ['email' => $child->email])}}" class="btn  btn-default">
                            	About Me
                        	</a>
						</div>
					@endforeach
				</div>	
			</div>
		</div>
		
@endsection