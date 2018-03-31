@extends('layouts.auth')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Change Password</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open([
          'action' => [
            'UsersController@change_pass_save', 
            $user->id
          ], 
          'method' => 'PUT'
        ]) !!}
          <div class="box-body">
			<div class="form-group">            	
              <label for="password_current">Current Password</label>
              <input type="password" class="form-control{{ $errors->has('password_current') ? ' is-invalid' : '' }}" name="password_current" required id="password_current">
                @if ($errors->has('password_current'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password_current') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">            	
              <label for="password">New Password</label>
              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required id="password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirm New Password</label>
              <input type="password" class="form-control" name="password_confirmation" required id="password_confirmation">
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        {{ Form::close() }}
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()