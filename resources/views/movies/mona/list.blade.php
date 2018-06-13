@extends('layouts.guest')

@section('content')
	
	<div class="breadcrumb">
		<h2>Mona</h2>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="list-group">
					<li class="list-group-item">
						<a onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='gray'" href="{{ url('mona/sarah') }}">Sarah ang muting princessa</a>
					</li>
					<li class="list-group-item">
						<a onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='gray'" href="{{ url('mona/pulubi') }}">Ang pulubi at ang princessa</a>
					</li>
				</ul>
			</div>		
		</div>
	</div>
		
@endsection