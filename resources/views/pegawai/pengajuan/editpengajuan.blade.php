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
                    <h1>Edit Status Pengajuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pegawai.pengajuan') }}">Table Pengajuan</a></li>
                        <li class="breadcrumb-item active">Edit Status Pengajuan</li>
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
                            <h3 class="card-title">Edit Status Pengajuan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('pegawai.ubahpengajuan') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        value="{{ $pengajuans->id }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="nik_penduduk" class="form-control" id="nik_penduduk"
                                        value="{{ $pengajuans->nik_penduduk }}" placeholder="Enter NIK Penduduk">
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="0" {{ $pengajuans->status === '0' ? 'selected' : '' }}>Belum
                                            Disetujui</option>
                                        <option value="1" {{ $pengajuans->status === '1' ? 'selected' : '' }}>
                                            Disetujui</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">No Dokumen</label>
                                    <input type="text" name="no_dokumen_perjalanan" class="form-control" id="no_dokumen_perjalanan"
                                        value="{{ $pengajuans->no_dokumen_perjalanan }}" placeholder="Enter No Dokumen">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_jenis_surat" class="form-control" id="id_jenis_surat"
                                        value="{{ $pengajuans->id_jenis_surat }}" placeholder="Enter Jenis Surat">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('pegawai.pengajuan') }}" type="button"
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
