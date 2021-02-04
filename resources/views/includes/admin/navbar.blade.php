<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <form action="{{ url('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn text-white">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <span>Logout</span>
          </button>
          {{-- <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <span>Logout</span>
          </a> --}}
        </form>
    </li>
</ul>
</nav>
<!-- /.navbar -->