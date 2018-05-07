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
            @if($movie->is_html5)
              <video width="960" height="720" controls controlsList="nodownload" style="margin-top: -90px;">
                <source src="{{ asset('storage/'.$movie->video) }}" type="video/mp4">
                <source src="{{ asset('storage/'.$movie->video) }}" type="video/ogg">
              Your browser does not support the video tag.
              </video>
            @else
              <p><code id="progress_label">Converting...</code></p>

              <div class="progress active">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  <span class="sr-only">40% Complete (success)</span>
                </div>
              </div>
            @endif
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

@section('js')
    <script src="{{ asset('auth/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            setInterval(function() {
                $.ajax({
                    url: "{{ url('movies/convert_percentage').'/' }}",
                    type: "GET",
                    success: function(response) {
                      console.log(response);
                      $('.progress-bar-primary').css('width', response+'%');
                      $("#progress_label").html('Converting... '+response+'%');
                    }
               });
            }, 5000);
        })
    </script>
@endsection