@extends('layouts.auth')

@section('css')
    <link rel="stylesheet" href="{{ asset('auth/bower_components/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/primary/'.($user->photo ? $user->photo : 'noimage.png')) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $user->first_name.' '.$user->last_name }}</h3>

              <p class="text-muted text-center">Occupation : {{ $user->occupation ? $user->occupation : 'None'}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#children" data-toggle="tab">Children</a></li>
              <li><a href="#siblings" data-toggle="tab">Siblings</a></li>
              <li><a href="#parents" data-toggle="tab">Parents</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="children">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Children ({{ $user->children()->count() }})</h3>
                        <div class="pull-right">
                            <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Child</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Birthday</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->children() as $child)
                                    <tr>
                                        <td><img src="{{ asset('images/primary/'.($child->photo ? $child->photo : 'noimage.png')) }}" width="100" height="100"></td>
                                        <td>{{ $child->last_name.', '.$child->first_name.' '.substr($child->middle_name, 0,1).'.' }}</td>
                                        <td>{{ $child->age }}</td>
                                        <td>{{ $child->birthday }}</td>
                                        <td>
                                            <a href="{{ route('users.show', ['id' => $child->id])}}" class="btn btn-primary">
                                                Profile
                                            </a> 
                                             <a href="{{ route('users.remove_child', ['id' => $user->id, 'child_id' => $child->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove him/her as his/her child?')">
                                                Remove
                                            </a>   
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                    </div>
                </div>
              </div>
              
              <div class="tab-pane" id="siblings">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Siblings ({{ count($siblings) ? count($siblings)-1 : 0 }})</h3>
                        <div class="pull-right">
                            <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Sibling(error)</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Birthday</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->siblings() as $child)
                                    @if($child->id == $user->id)
                                        @continue
                                    @endif
                                    <tr>
                                        <td><img src="{{ asset('images/primary/'.($child->photo ? $child->photo : 'noimage.png')) }}" width="100" height="100"></td>
                                        <td>{{ $child->last_name.', '.$child->first_name.' '.substr($child->middle_name, 0,1).'.' }}</td>
                                        <td>{{ $child->age }}</td>
                                        <td>{{ $child->birthday }}</td>
                                        <td>  
                                            <a href="{{ route('users.show', ['id' => $child->id])}}" class="btn btn-primary">
                                                Profile
                                            </a> 
                                             <a href="{{ route('users.remove_child', ['id' => $user->parent_id, 'child_id' => $child->id, 'selected_id' => $user->id])}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove him/her as his/her sibling?')">
                                                Remove
                                            </a> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                    </div>
                </div>
              </div>

              <div class="tab-pane" id="parents">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Parents</h3>
                        <div class="pull-right">
                            <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Parent(error)</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <? $parents = $user->parents(); ?>
                            @if($parents['one'])
                                <div class="col-md-6">
                                    <img id="child_photo" class="img-circle" src="{{ asset('images/primary/'.($parents['one']->photo ? $parents['one']->photo : 'noimage.png')) }}" alt="Child profile picture" width="225" height="225">
                                    <h3 id="child_name">{{ $parents['one']->last_name.', '.$parents['one']->first_name.' '.substr($parents['one']->middle_name, 0,1).'.' }}</h3>
                                    <p id="child_occupation">{{ $parents['one']->occupation }}</p>
                                </div>
                            @endif
                            @if($parents['two'])
                                <div class="col-md-6">
                                    <img id="child_photo" class="img-circle" src="{{ asset('images/primary/'.($parents['two']->photo ? $parents['two']->photo : 'noimage.png')) }}" alt="Child profile picture" width="225" height="225">
                                    <h3 id="child_name">{{ $parents['two']->last_name.', '.$parents['two']->first_name.' '.substr($parents['two']->middle_name, 0,1).'.' }}</h3>
                                    <p id="child_occupation">{{ $parents['two']->occupation }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
            
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add new child</h4>
              </div>
                <form method="POST" action="{{ route('users.store_child') }}" role="form">
                {{ csrf_field() }}
                      <div class="modal-body">
                        {{ Form::hidden('id', $user->id) }}
                        <div class="form-group">
                            {{ Form::label('child_id', 'Child Name') }}
                            {{ Form::select('child_id', $users, null, ['class'=>'form-control select2', 'id'=>'child_id', 'style'=>'width:100%']) }}
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <img id="child_photo" class="img-circle" src="{{ asset('images/primary/noimage.png') }}" alt="Child profile picture" width="225" height="225">
                          </div>
                          <div class="col-md-6">
                            <h3 id="child_name">None</h3>
                            <p id="child_occupation">None</p>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <input type="submit" value="Add Child" class="btn btn-primary">
                      </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  @endsection()

@section('js')
    <script src="{{ asset('auth/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();

            $('.select2').change(function(e) {  // e=event
                $.ajax({
                    url: "{{ url('users/getUserById').'/' }}"+$(this).val(),
                    type: "GET",
                    success: function(response) {
                      var myObj = $.parseJSON(response);
                      $("#child_name").html(myObj['first_name']+" "+myObj['last_name']);
                      $("#child_occupation").html(myObj['occupation']);
                      if(myObj['photo']) {
                        $("#child_photo").attr("src", "{{ asset('images/primary') }}"+'/'+myObj['photo']);
                      } else {
                        $("#child_photo").attr("src", "{{ asset('images/primary/noimage.png') }}");
                      }
                    }
               });
            });
        })
    </script>
@endsection