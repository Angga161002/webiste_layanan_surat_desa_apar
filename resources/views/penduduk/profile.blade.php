@section('title', 'Dashboard Penduduk')

@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebarpenduduk')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile {{ $penduduk->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile Penduduk</li>
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
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profile Penduduk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('penduduk.profileedit') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" value="{{ $penduduk->nik }}" class="form-control" id="nik"
                                        placeholder="Enter NIK" required pattern="[0-9]{16}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $penduduk->name }}" class="form-control" id="name"
                                        placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $penduduk->email }}" class="form-control" id="email"
                                        placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" value="{{ $penduduk->pekerjaan }}" class="form-control" id="pekerjaan"
                                        placeholder="Enter Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}" class="form-control" id="tanggal_lahir"
                                        placeholder="Enter Tanggal lahir">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{ $penduduk->tempat_lahir }}" class="form-control" id="tempat_lahir"
                                        placeholder="Enter Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ $penduduk->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ $penduduk->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>                                    
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" value="{{ $penduduk->alamat }}" class="form-control" id="alamat"
                                        placeholder="Enter Alamat">
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control" id="agama">
                                        <option value="">Pilih Agama</option>
                                        <option value="islam" {{ $penduduk->agama === 'islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="kristen" {{ $penduduk->agama === 'kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="hindu" {{ $penduduk->agama === 'hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="buddha" {{ $penduduk->agama === 'buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="konghucu" {{ $penduduk->agama === 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="number" name="no_hp" value="{{ $penduduk->no_hp }}" class="form-control" id="no_hp"
                                        placeholder="Enter No Hp">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Jika Tidak Ingin Merubah Password Kosongkan Saja">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('penduduk') }}" type="button" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan Profile</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-2">
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
