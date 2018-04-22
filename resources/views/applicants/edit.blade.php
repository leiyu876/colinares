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
        		'ApplicantsController@update', 
        		$applicant->id
        	], 
        	'method' => 'PUT',
            'enctype'=> 'multipart/form-data'
        ]) !!}
          <div class="box-body">
            <div class="form-group">
                {{ Form::label('name', 'Complete Name') }}
                {{ Form::text('name', old('name', $applicant->name), ['class'=>'form-control', 'id'=>'name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', old('email', $applicant->email), ['class'=>'form-control', 'id'=>'email']) }}
            </div>  
            <div class="form-group">
              {{ Form::label('resume', 'Resume / CV') }}
              {{ Form::file('resume', ['class'=>'form-control', 'id'=>'resume']) }}
            </div>          
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('applicants') }}" class="btn btn-default">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        {!! Form::close() !!}
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()