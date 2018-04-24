<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('storage/'.displayImage(Auth::user()->photo)) }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Users List</a></li>
          <li><a href="{{ url('users/create') }}"><i class="fa fa-circle-o"></i> Create User</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>OFW</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('applicants.index') }}"><i class="fa fa-circle-o"></i> Applicants</a></li>
          <li><a href="{{ route('agencies.index') }}"><i class="fa fa-circle-o"></i> Agencies</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-video-camera"></i> <span>Movies</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('movies.index') }}"><i class="fa fa-circle-o"></i> Movie List</a></li>
          <li><a href="{{ url('movies/create') }}"><i class="fa fa-circle-o"></i> Create Movie</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
