@if($errors->any() || session('success') || session('error'))
	<div class="row">
		<div class="col-md-12">
			@if($errors->any())
				<div class="alert alert-danger alert-dismissible">
			        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
			        <ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
			    </div>
			@endif

			@if(session('success'))
				<div class="alert alert-success alert-dismissible">
			    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    	<h4><i class="icon fa fa-check"></i> Alert!</h4>
			    	{{ session('success') }}
			  	</div>
			@endif

			@if(session('error'))
				<div class="alert alert-danger alert-dismissible">
			    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			    	<h4><i class="icon fa fa-chbanck"></i> Alert!</h4>
			    	{{ session('error') }}
			  	</div>
			@endif
		</div>
	</div>
@endif