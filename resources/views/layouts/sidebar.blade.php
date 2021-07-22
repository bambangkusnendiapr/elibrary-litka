<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/')}}" class="brand-link">
      <img src="{{ url('adminlte/dist/img/Logo Pemuda Vector.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Library PD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('dashboard')}}" class="nav-link @yield('dashboard')">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <br>
          
          <li class="nav-item">
            <a href="{{ route('buku.index') }}" class="nav-link @yield('buku')">
            <i class="fas fa-book"></i>
              <p>
                Buku
              </p>
            </a>
          </li>
          <li class="nav-item @if(Request::segment(1) == 'master-data') active menu-open @endif">
            <a href="#" class="nav-link @yield('kategori_dan_barang')">
            <i class="fas fa-box-open"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pengarang.index') }}" class="nav-link @yield('pengarang')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengarang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('penerbit.index') }}" class="nav-link @yield('penerbit')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerbit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="nav-link @yield('kategori')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              @if(Auth::user()->name == "Developer")
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link @yield('pengguna')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('role.index') }}" class="nav-link @yield('role')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Role</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('otonom.index') }}" class="nav-link @yield('otonom')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Otonom</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @if(Auth::user()->name == "Developer")
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fas fa-tasks"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          @endif
          <br>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>