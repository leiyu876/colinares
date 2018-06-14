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
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="is_embedded" id="is_embedded" {{ old('is_embedded') == 'on' ? 'checked="true"':'' }}> Is embedded from other website?
                  </label>
                </div>
              </div>
              <div class="form-group" id="embedded_link">
                {{ Form::label('embedded_link', 'Copy the website embedded link here.') }}
                {{ Form::text('embedded_link', null, ['class'=>'form-control']) }}
              </div>
              <div class="form-group" id="video">
                  {{ Form::label('video', 'Video') }}
                  {{ Form::file('video', ['class'=>'form-control']) }}
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

@section('js')
  <script src="{{ asset('auth/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {

        $('.select2').select2()
      
        if ($('#is_embedded').is(":checked")) {
            $("#video").hide();
            $("#embedded_link").show();
        } else {
            $("#video").show();
            $("#embedded_link").hide();
        }
      
        $('#is_embedded').click(function () {
            if ($(this).is(":checked")) {
                $("#video").hide();
                $("#embedded_link").show();
                console.log('check');  
            } else {
                $("#video").show();
                $("#embedded_link").hide();
              console.log('not check');
            }
         });
    });
    
      
  </script>
  
@endsection
