  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('kota-pariaman.png') }}" alt="Kota Pariaman" class="brand-image">
          <span class="brand-text font-weight-light">Desa Apar</span>
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
                  <a href="{{ route('penduduk.profile') }}" class="d-block">
                      {{ $penduduk->name }}
                  </a>
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
                      <a href="{{ route('penduduk') }}" class="nav-link active">
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
                              <a href="{{ route('penduduk.pengajuan') }}" class="nav-link">
                                  <i class="fa fa-tasks" style="margin-left: 19px; margin-right: 9px;"></i>
                                  <p>Tabel Pengajuan</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('penduduk.jenissurat') }}" class="nav-link">
                                  <i class="fa fa-file" style="margin-left: 20px; margin-right: 13px;"></i>
                                  <p>Tabel Jenis Surat</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-header">EXAMPLES</li>
                  <li class="nav-item">
                      <a href="{{ route('penduduk.calendar') }}" onclick="toggleActive(this)" class="nav-link">
                          <i class="nav-icon far fa-calendar-alt"></i>
                          <p>
                              Calendar
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('penduduk.gallery') }}" onclick="toggleActive(this)" class="nav-link">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                              Gallery
                          </p>
                      </a>
                  </li>
                  <li class="nav-item" style="margin-left: 5px;">
                      <form action="{{ route('penduduk.logout') }}" method="post">
                          @csrf
                          <button type="button" class="nav-link" onclick="buttonLogout(this)"
                              style="border: none; background: none; color: #c2c7d0; margin-left: -62px;"><i
                                  class="nav-icon fa fa-arrow-circle-right"></i>
                              Log Out </button>
                      </form>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
  <!-- Tambahkan SweetAlert CDN di bagian head jika belum ada -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      function buttonLogout(button) {
          // Tampilkan SweetAlert untuk konfirmasi log out
          Swal.fire({
              title: 'Konfirmasi Log Out',
              text: "Anda yakin ingin keluar?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Log Out',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Jika tombol "Ya, Log Out" diklik, submit form log out
                  button.closest('form').submit();
              }
          });
      }
  </script>
