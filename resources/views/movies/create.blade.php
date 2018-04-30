@extends('layouts.auth')

@section('css')
    <link rel="stylesheet" href="{{ asset('auth/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ $page_title }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('movies.store') }}" role="form" enctype="multipart/form-data">
        {{ csrf_field() }}
          
         	<div class="box-body">
            	<div class="form-group">
            		{{ Form::label('title', 'Title') }}
            		{{ Form::text('title',null, ['class'=>'form-control', 'id'=>'title']) }}
            	</div>
              <div class="form-group">
                {{ Form::label('slug', 'Slug') }}
                {{ Form::text('slug',null, ['class'=>'form-control', 'id'=>'slug']) }}
              </div>
              <div class="form-group">
                {{ Form::label('released_year', 'Released Year') }}
                {{ Form::text('released_year',null, ['class'=>'form-control', 'id'=>'released_year']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('video', 'Video') }}
                  {{ Form::file('video', ['class'=>'form-control', 'id'=>'video']) }}
              </div>
              <div class="form-group">
                  {{ Form::label('image', 'Image') }}
                  {{ Form::file('image', ['class'=>'form-control', 'id'=>'image']) }}
              </div>
          	</div>
          <div class="box-footer">
	        	<a href="{{ url('movies') }}" class="btn btn-default">Cancel</a>
	        	<button type="submit" class="btn btn-primary pull-right">Create</button>
	        </div>
        </form>
      </div>
    </div>
  </div>

@endsection()
