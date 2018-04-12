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
          <h3 class="box-title">Update User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open([
        	'action' => [
        		'UsersController@update', 
        		$user->id
        	], 
        	'method' => 'PUT',
            'enctype'=> 'multipart/form-data'
        ]) !!}
          <div class="box-body">
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', $user->email, ['class'=>'form-control', 'id'=>'email']) }}
            </div>
            <div class="form-group">
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', $user->first_name, ['class'=>'form-control', 'id'=>'first_name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', $user->last_name, ['class'=>'form-control', 'id'=>'last_name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('middle_name', 'Middle Name') }}
                {{ Form::text('middle_name', $user->middle_name, ['class'=>'form-control', 'id'=>'middle_name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('nick_name', 'Nick Name') }}
                {{ Form::text('nick_name', $user->nick_name, ['class'=>'form-control', 'id'=>'nick_name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('birthday', 'Birthday') }}
                {{ Form::date('birthday', $user->birthday, ['class'=>'form-control', 'id'=>'birthday']) }}
            </div>
            <div class="form-group">
                {{ Form::label('lastday', 'Date Died') }}
                {{ Form::date('lastday', $user->lastday, ['class'=>'form-control', 'id'=>'lastday']) }}
            </div>
            <div class="form-group">
                {{ Form::label('gender', 'Gender') }}
                {{ Form::select('gender', $genders, $user->gender, ['class'=>'form-control select2', 'id'=>'gender']) }}
            </div>
            <div class="form-group">
                {{ Form::label('marital_status', 'Marital Status') }}
                {{ Form::text('marital_status', $user->marital_status, ['class'=>'form-control', 'id'=>'marital_status']) }}
            </div>
            <div class="form-group">
                {{ Form::label('nationality', 'Nationality') }}
                {{ Form::text('nationality', $user->nationality, ['class'=>'form-control', 'id'=>'nationality']) }}
            </div>
            <div class="form-group">
                {{ Form::label('religion', 'Religion') }}
                {{ Form::text('religion', $user->religion, ['class'=>'form-control', 'id'=>'religion']) }}
            </div>
            <div class="form-group">
                {{ Form::label('phone', 'Contact Number') }}
                {{ Form::text('phone', $user->phone, ['class'=>'form-control', 'id'=>'phone']) }}
            </div>
            <div class="form-group">
                {{ Form::label('degree', 'Degree') }}
                {{ Form::text('degree', $user->degree, ['class'=>'form-control', 'id'=>'degree']) }}
            </div>
            <div class="form-group">
                {{ Form::label('married_to', 'Married To') }}
                {{ Form::select('married_to', $users->prepend('None', 0), $user->married_to, ['class'=>'form-control select2', 'id'=>'married_to']) }}
            </div>
            <div class="form-group">
                {{ Form::label('married_date', 'Married Date') }}
                {{ Form::date('married_date', $user->married_date, ['class'=>'form-control', 'id'=>'married_date']) }}
            </div>
            <div class="form-group">
                {{ Form::label('color_code', 'Color Code') }}
                {{ Form::text('color_code', $user->color_code, ['class'=>'form-control', 'id'=>'color_code']) }}
            </div>
            <div class="form-group">
                {{ Form::label('home_address', 'Home Address') }}
                {{ Form::text('home_address', $user->home_address, ['class'=>'form-control', 'id'=>'home_address']) }}
            </div>
            <div class="form-group">
                {{ Form::label('current_address', 'Current Address') }}
                {{ Form::text('current_address', $user->current_address, ['class'=>'form-control', 'id'=>'current_address']) }}
            </div>
            <div class="form-group">
                {{ Form::label('occupation', 'Occupation') }}
                {{ Form::text('occupation', $user->occupation, ['class'=>'form-control', 'id'=>'occupation']) }}
            </div>
            <div class="form-group">
                {{ Form::label('company_name', 'Company Name') }}
                {{ Form::text('company_name', $user->company_name, ['class'=>'form-control', 'id'=>'company_name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('company_address', 'Company Address') }}
                {{ Form::text('company_address', $user->company_address, ['class'=>'form-control', 'id'=>'company_address']) }}
            </div>
            <div class="form-group">
                {{ Form::label('company_phone', 'Company Phone') }}
                {{ Form::text('company_phone', $user->company_phone, ['class'=>'form-control', 'id'=>'company_phone']) }}
            </div>
            <div class="form-group">
                {{ Form::label('photo', 'Photo') }}
                {{ Form::file('photo', ['class'=>'form-control', 'id'=>'photo']) }}
            </div>
        </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <a href="{{ url('users') }}" class="btn btn-default">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary pull-right">
          </div>
        {!! Form::close() !!}
      </div>
      <!-- /.box -->


    </div>
    
  </div>

  @endsection()

  @section('js')
    <script src="{{ asset('auth/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2()
        })
    </script>
  @endsection