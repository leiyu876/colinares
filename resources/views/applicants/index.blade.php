@extends('layouts.auth')

@section('css')
    <link rel="stylesheet" href="{{ asset('auth/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')

    <div class="row">   
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $page_title }}</h3>
                    <div class="pull-right">
                        <a href="{{ url('applicants/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add Applicant</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicants as $applicant)
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td>{{ $applicant->id }}</td>
                                    <td>{{ $applicant->name }}</td>
                                    <td>{{ $applicant->email }}</td>
                                    <td>{{ $applicant->status == 'open' ? 'sending' : 'ready' }}</td>
                                    <td>
                                        @if(!$applicant_running)
                                            <a href="{{ route('applicants.send', ['id' => $applicant->id])}}" class="show-queuelisten-info">
                                                <i class="fa fa-fw fa-send" data-toggle="tooltip" title="Send email to agencies"></i>
                                            </a>
                                        @endif
                                        @if($applicant_running && $applicant_running->id != $applicant->id)
                                            <a href="{{ route('applicants.edit', ['id' => $applicant->id])}}">
                                                <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                            </a>

                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" data-method="delete" class="jquery-postback" value="{{ $applicant->id }}">
                                                <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                            </a>
                                        @elseif(!$applicant_running)
                                            <a href="{{ route('applicants.edit', ['id' => $applicant->id])}}">
                                                <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                            </a>

                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <a href="#" data-method="delete" class="jquery-postback" value="{{ $applicant->id }}">
                                                <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                            </a>
                                        @endif

                                        {!! Form::open(['action'=> ['ApplicantsController@destroy', $applicant->id], 'method'=>'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$applicant->id, 'style'=>'display:none']) }}
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

        $(document).on('click', 'a.jquery-postback', function(e) {

            e.preventDefault(); // does not go through with the link.
            
            var ask = window.confirm("Are you sure you want to delete this applicant?");
            
            if (ask) {
                
                var $this = $(this);

                $( "#name"+$this.attr('value') ).click();

            }         
        });

        $(document).on('click', 'a.show-queuelisten-info', function(e) {

            var ask = window.confirm("If local please run the command 'php artisan leo:sendagencies because no cronjob was set'");
            
            if (!ask) {
                
                e.preventDefault(); // does not go through with the link.

            }         
        });
    </script>
@endsection()