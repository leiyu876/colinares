@extends('layouts.auth')

@section('content')

  <div class="row">
    <!-- left column -->
    <div class="col-md-6 col-md-offset-3">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('users.store') }}" role="form">
        {{ csrf_field() }}
          
         	<div class="box-body">
          		<div class="form-group">
              		{{ Form::label('email', 'Email') }}
          			
            			{{ Form::email('email', null, ['class'=>'form-control', 'id'=>'email']) }}
          		</div>
            	<div class="form-group">
              		{{ Form::label('first_name', 'First Name') }}
              		
                		{{ Form::text('first_name',null, ['class'=>'form-control', 'id'=>'first_name']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('last_name', 'Last Name') }}
              		
                		{{ Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('middle_name', 'Middle Name') }}
              		
                		{{ Form::text('middle_name', null, ['class'=>'form-control', 'id'=>'middle_name']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('nick_name', 'Nick Name') }}
              		
                		{{ Form::text('nick_name', null, ['class'=>'form-control', 'id'=>'nick_name']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('birthday', 'Birthday') }}
              		
                		{{ Form::date('birthday', null, ['class'=>'form-control', 'id'=>'birthday']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('gender', 'Gender') }}
              		
                		{{ Form::text('gender', null, ['class'=>'form-control', 'id'=>'gender']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('marital_status', 'Marital Status') }}
              		
                		{{ Form::text('marital_status', null, ['class'=>'form-control', 'id'=>'marital_status']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('nationality', 'Nationality') }}
              		
                		{{ Form::text('nationality', null, ['class'=>'form-control', 'id'=>'nationality']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('religion', 'Religion') }}
              		
                		{{ Form::text('religion', null, ['class'=>'form-control', 'id'=>'religion']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('phone', 'Contact Number') }}
              		
                		{{ Form::text('phone', null, ['class'=>'form-control', 'id'=>'phone']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('degree', 'Degree') }}
              		
                		{{ Form::text('degree', null, ['class'=>'form-control', 'id'=>'degree']) }}
              	</div>
            	<div class="form-group">
                    {{ Form::label('married_to', 'Married To') }}
              		{{ Form::select('married_to', $users->prepend('All', 0), null, ['class'=>'form-control', 'id'=>'married_to']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('married_date', 'Married Date') }}
              		
                		{{ Form::date('married_date', null, ['class'=>'form-control', 'id'=>'married_date']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('color_code', 'Color Code') }}
              		
                		{{ Form::text('color_code', null, ['class'=>'form-control', 'id'=>'color_code']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('home_address', 'Home Address') }}
              		
                		{{ Form::text('home_address', null, ['class'=>'form-control', 'id'=>'home_address']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('current_address', 'Current Address') }}
              		
                		{{ Form::text('current_address', null, ['class'=>'form-control', 'id'=>'current_address']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('occupation', 'Occupation') }}
              		
                		{{ Form::text('occupation', null, ['class'=>'form-control', 'id'=>'occupation']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('company_name', 'Company Name') }}
              		
                		{{ Form::text('company_name', null, ['class'=>'form-control', 'id'=>'company_name']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('company_address', 'Company Address') }}
              		
                		{{ Form::text('company_address',null, ['class'=>'form-control', 'id'=>'company_address']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('company_phone', 'Company Phone') }}
              		
                		{{ Form::text('company_phone', null, ['class'=>'form-control', 'id'=>'company_phone']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('password', 'Password') }}
              		
                		{{ Form::password('password', ['class'=>'form-control', 'id'=>'password']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('password_confirmation', 'Confirm Password') }}
              		
                		{{ Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) }}
              	</div>
          	</div>

	        <div class="box-footer">
	        	<a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
	        	<button type="submit" class="btn btn-primary pull-right">Create</button>
	        </div>
        </form>
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()