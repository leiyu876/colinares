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
                    <div class="pull-right" style="margin-left: 10px;">
                        <a href="{{ url('workabroad/princess/'.($page + 1)) }}" class="btn btn-block btn-primary">Next</a>
                    </div>
                    @if($page > 1)
                        <div class="pull-right" style="margin-left: 10px;">
                            <a href="{{ url('workabroad/princess/'.($page - 1)) }}" class="btn btn-block btn-primary">Back</a>
                        </div>
                    @endif
                    <div class="pull-right">
                        <h4>Workabroad</h4>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $detail)
                                <tr>
                                    <td>{{ $loop->index + 1}}</td>
                                    <td><? echo $detail; ?></td>
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