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
      <li class="{{ Request::is('home') ? 'menu-open' : '' }}"><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview {{ Request::is('users*') ? 'menu-open' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="{{ Request::is('users*') ? 'display:block' : '' }}">
          <li  class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ url('users') }}"><i class="fa fa-circle-o"></i> Users List</a></li>
          <li  class="{{ Request::is('users/create') ? 'active' : '' }}"><a href="{{ url('users/create') }}"><i class="fa fa-circle-o"></i> Create User</a></li>
        </ul>
      </li>
      <li class="treeview {{ Request::is('applicants') || Request::is('agencies') ? 'menu-open' : '' }}">
        <a href="#">
          <i class="fa fa-users"></i> <span>OFW</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="{{ Request::is('applicants') || Request::is('agencies') ? 'display:block' : '' }}">
          <li  class="{{ Request::is('applicants') ? 'active' : '' }}"><a href="{{ route('applicants.index') }}"><i class="fa fa-circle-o"></i> Applicants</a></li>
          <li  class="{{ Request::is('agencies') ? 'active' : '' }}"><a href="{{ route('agencies.index') }}"><i class="fa fa-circle-o"></i> Agencies</a></li>
          <li  class="{{ Request::is('workabroad') ? 'active' : '' }}"><a href="{{ url('workabroad/princess') }}"><i class="fa fa-circle-o"></i> Princess Jobs</a></li>
        </ul>
      </li>
      <li class="treeview {{ Request::is('movies*') ? 'menu-open' : '' }}">
        <a href="#">
          <i class="fa fa-video-camera"></i> <span>Movies</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="{{ Request::is('movies*') ? 'display:block' : '' }}">
          <li class="{{ Request::is('movies') ? 'active' : '' }}"><a href="{{ route('movies.index') }}"><i class="fa fa-circle-o"></i> Movie List</a></li>
          <li class="{{ Request::is('movies/create') ? 'active' : '' }}"><a href="{{ url('movies/create') }}"><i class="fa fa-circle-o"></i> Create Movie</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
