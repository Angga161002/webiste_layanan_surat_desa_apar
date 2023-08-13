@section('title', 'Dashboard Pegawai')

@include('layouts.header')
<style>
    .password-toggle {
        position: relative;
    }

    .password-toggle__icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        user-select: none;
        z-index: 1;
    }
</style>

@include('layouts.navbar')

@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tabel Pegawai</li>
                        <li class="breadcrumb-item active">Tambah Pegawai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('pegawai.tambahpegawai') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="username" name="username" class="form-control" id="username"
                                        placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No Hp</label>
                                    <input type="number" name="no_hp" class="form-control" id="nohp"
                                        placeholder="Enter No Hp">
                                </div>
                                <div class="form-group">
                                    <label class="label-title">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        onkeyup='check();' placeholder="Masukan Kata Sandi">
                                    <span class="password-toggle__icon" onclick="togglePasswordVisibility(this)"><i
                                            class="fa fa-eye" style="margin-top: 264px; margin-right: 20px"></i></span>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('pegawai.pegawai') }}" type="button"
                                    class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right">Tambah</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')
{{-- Extra Script --}}
<script>
    function togglePasswordVisibility(icon) {
        var input = icon.previousElementSibling;
        var iconElement = icon.querySelector("i");
        if (input.type === "password") {
            input.type = "text";
            iconElement.classList.remove("fa-eye");
            iconElement.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            iconElement.classList.remove("fa-eye-slash");
            iconElement.classList.add("fa-eye");
        }
    }
</script>
{{-- End Extra Script --}}