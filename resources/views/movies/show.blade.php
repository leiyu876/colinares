@extends('layouts.auth')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $page_title }}</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-10">
            <video width="960" height="720" controls controlsList="nodownload" style="margin-top: -90px;">
              <source src="{{ asset('storage/'.$movie->video) }}" type="video/mp4">
              <source src="{{ asset('storage/'.$movie->video) }}" type="video/ogg">
            Your browser does not support the video tag.
            </video>
          </div>
          <div class="col-sm-2">
            <a href="{{ url('movies') }}" class="btn btn-default">Go Back</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box -->

  </section>
@endsection()