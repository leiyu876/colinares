@extends('layouts.guest')

@section('css')
	<style type="text/css">
		.container_img {
		    position: relative;
		    text-align: center;
		    color: white;
		}
		.top-right {
		    position: absolute;
		    top: 8px;
		    right: 16px;
		    color:yellow;
		}	
	</style>
@endsection

@section('content')
	
	<div class="breadcrumb">
		<h2>Tree</h2>
	</div>

		<div class="container">
			<div class="row">
				@foreach($breadcrumbs as $breadcrumb)
					<a href="{{ route('pages.tree', ['id' => $breadcrumb->id])}}">
						<img src="{{ asset('storage/'.displayImage($breadcrumb->photo)) }}" style="width: 50px; height: 50px; margin-bottom: 19.2px" class="img-rounded" data-toggle="tooltip" title="{{ $breadcrumb->first_name.' '.$breadcrumb->last_name }}">
					</a>
				@endforeach
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-3" style="margin-bottom: 20px">
					<img src="{{ asset('storage/'.displayImage($root->photo)) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px" class="{{ $root->lastday ? 'died' : '' }}">
					<p>Name : <strong> {{ $root->first_name.' '.$root->last_name }}</strong></p>
					<p>Age : <strong> {{ $root->age }}</strong></p>
					<p>Birthdate : <strong> {{ dateDBtoHuman($root->birthday) }}</strong></p>
					@if($root->lastday)
						<p>Date Died : <strong> {{ $root->lastday }}</strong></p>
					@else
						<p>Work : <strong> {{ $root->occupation }}</strong></p>
					@endif
					@if($root->partner())
						<img src="{{ asset('storage/'.( $root->partner() ? displayImage($root->partner()->photo) : 'noimage.png' )) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px" class="{{ $root->partner() ? ($root->partner()->lastday ? 'died' : '') : '' }}">
						<p>Name : <strong> {{ $root->partner() ? $root->partner()->first_name.' '.$root->partner()->last_name : '' }}</strong></p>
						<p>Age : <strong> {{ $root->partner() ? $root->partner()->age : '' }}</strong></p>
						<p>Birthdate : <strong> {{ $root->partner() ? dateDBtoHuman($root->partner()->birthday) : "" }}</strong></p>
						@if($root->partner() && $root->partner()->lastday)
							<p>Date Died : <strong> {{ $root->partner() ? $root->partner()->lastday : '' }}</strong></p>
						@else
							<p>Work : <strong> {{ $root->partner() ? $root->partner()->occupation : '' }}</strong></p>
						@endif
					@endif
				</div>	
				<div class="col-md-3" style="margin-bottom: 20px">
					@foreach($root->children() as $child)
						<div class="container_img">
							<img src="{{ asset('storage/'.displayImage($child->photo)) }}" style="width: 100%; height: 262.5px; margin-bottom: 19.2px" class="{{ $child->lastday ? 'died' : '' }}">
							<div class="top-right">{{ $loop->iteration }}</div>
						</div>		
						<span> Name : <strong>{{ $child->first_name.' '.$child->last_name }}</strong> </span>
						<a href="{{ route('pages.tree', ['id' => $child->id])}}" class="btn  btn-default">
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