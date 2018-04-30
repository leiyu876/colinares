@extends('layouts.auth')

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
        {!! Form::open([
        	'action' => [
        		'MoviesController@update', 
        		$movie->id
        	], 
        	'method' => 'PUT',
            'enctype'=> 'multipart/form-data'
        ]) !!}
          <div class="box-body">
            
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', $movie->title, ['class'=>'form-control', 'id'=>'title']) }}
            </div>
            <div class="form-group">
                {{ Form::label('slug', 'Slug') }}
                {{ Form::text('slug', $movie->slug, ['class'=>'form-control', 'id'=>'slug']) }}
            </div>
            <div class="form-group">
                {{ Form::label('released_year', 'Released Year') }}
                {{ Form::text('released_year', $movie->released_year, ['class'=>'form-control', 'id'=>'released_year']) }}
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
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('movies') }}" class="btn btn-default">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        {!! Form::close() !!}
      </div>
    </div>
    
  </div>

  @endsection()