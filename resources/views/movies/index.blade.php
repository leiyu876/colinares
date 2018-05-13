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
                        <a href="{{ url('movies/create') }}" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add Movie</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Url</th>
                                <th>Released Date</th>
                                <th>Visited</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td><img src="{{ asset('storage/'.displayImage($movie->image)) }}" width="100" height="100"></td>
                                    <td>{{ $movie->title }}</td>
                                    <td>
                                        @if($movie->is_html5)
                                            <a href="{{ route('movies.single', $movie->slug) }}">{{ route('movies.single', $movie->slug) }}</a>
                                        @else
                                            <p>Need to convert via local</p>
                                        @endif
                                    </td>
                                    <td>{{ $movie->released_year }}</td>
                                    <td>{{ $movie->visited }}</td>
                                    <td>
                                        
                                        <a href="{{ route('movies.show', ['id' => $movie->id])}}">
                                            <i class="fa fa-fw fa-eye" data-toggle="tooltip" title="View"></i>
                                        </a>   
                                        
                                        <a href="{{ route('movies.edit', ['id' => $movie->id])}}">
                                            <i class="fa fa-fw fa-pencil" data-toggle="tooltip" title="Edit"></i>
                                        </a>          

                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <a href="#" data-method="delete" class="jquery-postback" value="{{ $movie->id }}">
                                            <i class="fa fa-fw fa-trash" data-toggle="tooltip" title="Delete"></i>
                                        </a>

                                        {!! Form::open(['action'=> ['MoviesController@destroy', $movie->id], 'method'=>'POST']) !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', ['class'=>'btn btn-danger', 'id'=>'name'.$movie->id, 'style'=>'display:none']) }}
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
            
            var ask = window.confirm("Are you sure you want to delete this movie?");
            
            if (ask) {
                
                var $this = $(this);

                $( "#name"+$this.attr('value') ).click();

            }         
        });
    </script>
@endsection()