@section('title', 'Dashboard Pegawai')

@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.pegawai') }}">Table Pegawai</a></li>
                        <li class="breadcrumb-item active">Edit Pegawai</li>
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
                            <h3 class="card-title">Edit Pegawai</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('pegawai.ubahpegawai') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        value="{{ $pegawais->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="hidden" name="username" class="form-control" id="username"
                                        value="{{ $pegawais->username }}" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ $pegawais->email }}" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No Hp</label>
                                    <input type="number" name="no_hp" class="form-control" id="nohp"
                                        value="{{ $pegawais->no_hp }}" placeholder="Enter No Hp">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="hidden" name="password" class="form-control" id="password"
                                        value="{{ $pegawais->password }}" placeholder="Enter Password">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('pegawai.pegawai') }}" type="button"
                                    class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right">Edit</button>
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
