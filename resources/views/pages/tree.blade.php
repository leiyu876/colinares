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
				<div class="col-md-3"></div>
				<div class="col-md-3" style="margin-bottom: 20px">
					<img src="{{ asset('images/primary/'.( $root->photo ? $root->photo : 'noimage.png' )) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px" class="{{ $root->lastday ? 'died' : '' }}">
					<p>Name : <strong> {{ $root->first_name.' '.$root->last_name }}</strong></p>
					<p>Age : <strong> {{ $root->age }}</strong></p>
					<p>Birthdate : <strong> {{ dateDBtoHuman($root->birthday) }}</strong></p>
					@if($root->lastday)
						<p>Date Died : <strong> {{ $root->lastday }}</strong></p>
					@else
						<p>Work : <strong> {{ $root->occupation }}</strong></p>
					@endif
					<img src="{{ asset('images/primary/'.( $root->partner() ? ( $root->partner()->photo ? $root->partner()->photo : 'noimage.png' ) : 'noimage.png' )) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px" class="{{ $root->partner()->lastday ? 'died' : '' }}">
					<p>Name : <strong> {{ $root->partner() ? $root->partner()->first_name.' '.$root->partner()->last_name : '' }}</strong></p>
					<p>Age : <strong> {{ $root->partner() ? $root->partner()->age : '' }}</strong></p>
					<p>Birthdate : <strong> {{ $root->partner() ? dateDBtoHuman($root->partner()->birthday) : "" }}</strong></p>
					@if($root->partner()->lastday)
						<p>Date Died : <strong> {{ $root->partner() ? $root->partner()->lastday : '' }}</strong></p>
					@else
						<p>Work : <strong> {{ $root->partner() ? $root->partner()->occupation : '' }}</strong></p>
					@endif
				</div>	
				<div class="col-md-3" style="margin-bottom: 20px">
					@foreach($root->children() as $child)
						<img src="{{ asset('images/primary/'.( $child->photo ? $child->photo : 'noimage.png' )) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px" class="{{ $child->lastday ? 'died' : '' }}">
						<span> Name : <strong>{{ $child->first_name.' '.$child->last_name }}</strong> </span>
						<a href="{{ route('pages.tree', ['email' => $child->email])}}" class="btn  btn-default">
                        	About Me
                    	</a>
						<p> Age : <strong>{{ $child->age }}</strong></p>
						<p> Birthdate : <strong>{{ dateDBtoHuman($child->birthday) }}</strong></p>
						@if($child->lastday)
							<p>Date Died : <strong> {{ $child->lastday }}</strong></p>
						@else
							<p> Work : <strong>{{ $child->occupation }}</strong></p>
						@endif
					@endforeach
				</div>	
			</div>
		</div>
		
@endsection