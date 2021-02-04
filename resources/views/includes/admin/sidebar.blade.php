<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-danger">
  <!-- Brand Logo -->
  <a href="#" class="brand-link navbar-danger">
    <img src="{{ url('frontend/assets/image/logo/logo.png')}}" alt="Rama Wisata Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
    <span class="brand-text font-weight-light text-white">Rama Wisata</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('backend/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 text-sm">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('paket-pariwisata.index')}}" class="nav-link">
            <i class="nav-icon fas fa-bus"></i>
            <p>
              Paket Pariwisata
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Gallery
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('paket-gallery.index')}}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery Paket</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('gallery.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery Wisata</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('video.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Gallery Video</p>
              </a>
            </li>
          </ul>
          <li class="nav-item">
            <a href="{{ route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('/register')}}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Tambah User
              </p>
            </a>
          </li> --}}
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>