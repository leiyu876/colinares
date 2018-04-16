<?php
use \App\Http\Controllers\AgenciesController;
?>

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
                        <a href="{{ route('agencies.create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Generate Latest Agencies</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Telephone No.</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Contact Person</th>
                                <th>Validity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agencies as $agency)
                                <tr>
                                    <td>{{ $agency->id }}</td>
                                    <td>{{ $agency->name }}</td>
                                    <td>{{ $agency->address }}</td>
                                    <td>{{ $agency->telno }}</td>
                                    <td>
                                        <? $emails = json_decode($agency->email); ?>
                                        @foreach($emails as $email)
                                            {{ $email }}<br/>
                                        @endforeach
                                    </td>
                                    <td>{{ $agency->website }}</td>
                                    <td>{{ $agency->contact_person }}</td>
                                    <td>{{ $agency->validity }}</td>
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
    </script>
@endsection()