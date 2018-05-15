@extends('layouts.auth')

@section('css')
    <link rel="stylesheet" href="{{ asset('auth/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List of Users</h3>
                    <div class="pull-right">
                        <a href="{{ url('users/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add User</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td><img src="{{ asset('storage/'.displayImage($user->photo)) }}" width="100" height="100"></td>
                                    <td>{{ $user->last_name.', '.$user->first_name.' '.substr($user->middle_name, 0,1).'.' }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.show', ['id' => $user->id])}}">
                                            <i class="fa fa-fw fa-eye" data-toggle="tooltip" title="Profile"></i>
                                        </a>
                                        <a href="{{ route('users.edit', ['id' => $user->id])}}">
                                            <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                        </a>
                                        <a href="{{ url('users/change_pass/'.$user->id)}}">
                                            <i class="fa fa-fw fa-key" data-toggle="tooltip" title="Change Password"></i>
                                        </a>

                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="#" data-method="delete" class="jquery-postback" value="{{ $user->id }}">
                                            <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                        </a>

                                        {!! Form::open(['action'=> ['UsersController@destroy', $user->id], 'method'=>'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$user->id, 'style'=>'display:none']) }}
                                        {!! Form::close() !!}                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>     

  @endsection()

@section('js')
    <script src="{{ asset('auth/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('auth/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
        })

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', 'a.jquery-postback', function(e) {

            e.preventDefault(); // does not go through with the link.
            
            var ask = window.confirm("Are you sure you want to delete this user?");
            
            if (ask) {
                
                var $this = $(this);

                $( "#name"+$this.attr('value') ).click();

            }         
        });
    </script>
@endsection()