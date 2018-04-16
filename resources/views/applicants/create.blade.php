@extends('layouts.auth')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create User</h3>
            </div>
            <form method="POST" action="{{ route('applicants.store') }}" role="form">
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Complete Name') }}
                        {{ Form::text('name',null, ['class'=>'form-control', 'id'=>'name']) }}
                    </div>
              		<div class="form-group">
                  		{{ Form::label('email', 'Email') }}
              			{{ Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) }}
              		</div>
                </div>
                <div class="box-footer">
    	        	<a href="{{ url('applicants') }}" class="btn btn-default">Cancel</a>
    	        	<button type="submit" class="btn btn-primary pull-right">Create</button>
    	        </div>
            </form>
          </div>
        </div>
    </div>
@endsection()