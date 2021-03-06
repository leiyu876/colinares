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
          <h3 class="box-title">Create User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">
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
                    {{ Form::label('lastday', 'Date Died') }}
                    {{ Form::date('lastday', null, ['class'=>'form-control', 'id'=>'lastday']) }}
                </div>
            	<div class="form-group">
              		{{ Form::label('gender', 'Gender') }}
              		{{ Form::select('gender', $genders, null, ['class'=>'form-control select2', 'id'=>'gender']) }}
              	</div>

            	<div class="form-group">
              		{{ Form::label('marital_status', 'Marital Status') }}
              		{{ Form::select('marital_status', $maritalstatuses, null, ['class'=>'form-control select2', 'id'=>'marital_status']) }}
              	</div>
            	<div class="form-group">
              		{{ Form::label('nationality', 'Nationality') }}
              		{{ Form::select('nationality', $nationalities, null, ['class'=>'form-control select2', 'id'=>'nationality']) }}
                </div>
            	<div class="form-group">
              		{{ Form::label('religion', 'Religion') }}
              		{{ Form::select('religion', $religions, null, ['class'=>'form-control select2', 'id'=>'religion']) }}
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
              		{{ Form::select('married_to', $users->prepend('All', 0), null, ['class'=>'form-control select2', 'id'=>'married_to']) }}
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
                    {{ Form::label('photo', 'Photo') }}
                    {{ Form::file('photo', ['class'=>'form-control', 'id'=>'photo']) }}
                </div>
            	<div class="form-group">
              		{{ Form::label('password', 'Password') }}
              		{{ Form::password('password', ['class'=>'form-control', 'id'=>'password']) }}
              	</div>
            	{{-- <div class="form-group">
            		{{ Form::label('password_confirmation', 'Confirm Password') }}
            		{{ Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation']) }}
            	</div> --}}
              <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="auto_generate" id="auto_generate" checked="true"> Auto Generate Password
                    </label>
                  </div>
              </div>
          	</div>

	        <div class="box-footer">
	        	<a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
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
        $("#password").hide();
        $('#auto_generate').click(function () {
            if ($(this).is(":checked")) {
                $("#password").hide();
                console.log('check');  
            } else {
                $("#password").show();
              console.log('not check');
            }
         });
    });
    
      
  </script>
  
@endsection