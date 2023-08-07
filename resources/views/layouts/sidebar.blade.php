  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('kota-pariaman.png') }}" alt="Kota Pariaman" class="brand-image">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">Pemerintah Desa Apar</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="{{ route('pegawai') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link" onclick="toggleActive(this)">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Tables
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('pegawai.pegawai') }}" class="nav-link">
                                  <i class="fa fa-user me-5" style="margin-left: 21px; margin-right: 5px;"></i>
                                  <p>Tabel Pegawai</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('pegawai.penduduk') }}" class="nav-link">
                                  <i class="fa fa-users me-5" style="margin-left: 18px; margin-right: 5px;"></i>
                                  <p>Tabel Penduduk</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('pegawai.pengajuan') }}" class="nav-link">
                                  <i class="fa fa-tasks" style="margin-left: 19px; margin-right: 9px;"></i>
                                  <p>Tabel Pengajuan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('pegawai.jenissurat') }}" class="nav-link">
                                  <i class="fa fa-file" style="margin-left: 20px; margin-right: 13px;"></i>
                                  <p>Tabel Jenis Surat</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-header">EXAMPLES</li>
                  <li class="nav-item">
                      <a href="{{ route('pegawai.calendar') }}" onclick="toggleActive(this)" class="nav-link">
                          <i class="nav-icon far fa-calendar-alt"></i>
                          <p>
                              Calendar
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('pegawai.gallery') }}" onclick="toggleActive(this)" class="nav-link">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                              Gallery
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
