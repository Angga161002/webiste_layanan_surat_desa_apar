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
                    <h1>Tambah Jenis Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.jenissurat') }}">Table Jenis Surat</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Jenis Surat</li>
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
                            <h3 class="card-title">Tambah Jenis Surat</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('pegawai.tambahjenissurat') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name_surat">Name Surat</label>
                                    <input type="text" name="name_surat" class="form-control" id="name_surat"
                                        placeholder="Enter Name Surat">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('pegawai.jenissurat') }}" type="button"
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
