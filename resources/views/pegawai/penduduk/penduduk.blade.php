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
                    <h1>Table Penduduk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tabel Penduduk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table List Data Penduduk</h3>
                            <a href="{{ route('pegawai.addpenduduk') }}">
                                <button class="btn btn-sm btn-primary float-right ml-2"><img
                                        src="{{ asset('img') }}/plus-icon.svg" class="mr-1">Tambah Penduduk</button>
                            </a>
                            <button class="btn btn-sm btn-success float-right" data-toggle="modal"
                                data-target="#exampleModalExcle">
                                <img src="{{ asset('img') }}/plus-icon.svg" class="mr-1">Import Data Penduduk
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penduduks as $penduduks)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $penduduks->nik }}</td>
                                            <td>{{ $penduduks->name }}</td>
                                            <td>{{ $penduduks->email ? $penduduks->email : '-' }}</td>
                                            <td>{{ $penduduks->no_hp ? $penduduks->no_hp : '-' }}</td>
                                            <td><a type="button" class="btn-detail" data-nik={{ $penduduks->nik }}
                                                    title="Detail">
                                                    <img src="{{ asset('img') }}/eye-line-dark.svg">
                                                </a>&nbsp
                                                <a type="button" class="btn-hapus" data-nik={{ $penduduks->nik }}
                                                    title="Delete">
                                                    <img src="{{ asset('img') }}/delete-icon.svg">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach ()
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>No Hp</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade " id="detailModal" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="modalDetailLabel">Detail Penduduk</h5>
                    <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="border: 0px; background-color: white">
                        <img src="{{ asset('img') }}/icon-x.svg"
                            style="filter: grayscale(100%);"><!-- Menambahkan style filter untuk mengubah warna ikon menjadi abu-abu -->
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>NIK</th>
                            <td>:</td>
                            <td id="nik"></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>:</td>
                            <td id="name"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>:</td>
                            <td id="email">
                            <td>
                        </tr>
                        <tr>
                            <th>Pekerjaan</th>
                            <td>:</td>
                            <td id="pekerjaan">
                            <td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>:</td>
                            <td id="tanggal_lahir">
                            <td>
                        </tr>
                        <tr>
                            <th>Tempat Lahir</th>
                            <td>:</td>
                            <td id="tempat_lahir">
                            <td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>
                            <td id="jenis_kelamin">
                            <td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td id="alamat">
                            <td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>:</td>
                            <td id="agama">
                            <td>
                        </tr>
                        <tr>
                            <th>No Hp</th>
                            <td>:</td>
                            <td id="no_hp">
                            <td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalExcle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Pemasukan</h5>
                <button type="button" id="btn-closeexcel" class="btn-closeexcel" data-bs-dismiss="modal" aria-label="Close"
                    style="border: 0px; background-color: white">
                    <img src="{{ asset('img') }}/icon-x.svg"
                        style="filter: grayscale(100%);"><!-- Menambahkan style filter untuk mengubah warna ikon menjadi abu-abu -->
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('pegawai.importexcel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">File Excle</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                            name="file" placeholder="File Excle" autofocus>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btn-closeexcel2" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).on('click', '.btn-hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('data-nik');
        // console.log(link);

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data Akan di Hapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/pegawai/table/penduduk/hapus/" + link
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('.btn-detail').click(function() {
            var nik = $(this).attr('data-nik');
            console.log(nik);

            $.ajax({
                url: '/pegawai/table/penduduk/detail/' + nik, // Ganti dengan URL yang sesuai
                type: 'GET',
                data: {
                    nik: nik
                },
                success: function(response) {
                    // console.log(response.data.jml_pemasukan);
                    $('#detailContent').html(response);
                    $('#detailModal').modal('show');
                    $('#nik').text(response.data.nik);
                    $('#name').text(response.data.name);
                    $('#email').text(response.data.email);
                    $('#pekerjaan').text(response.data.pekerjaan);
                    $('#tanggal_lahir').text(new Date(response.data.tanggal_lahir)
                        .toLocaleDateString('id-ID', {
                            day: 'numeric',
                            month: 'long',
                            year: 'numeric'
                        }));
                    $('#tempat_lahir').text(response.data.tempat_lahir);
                    var jenisKelamin = response.data.jenis_kelamin === 'L' ? 'Laki-laki' :
                        'Perempuan';
                    $('#jenis_kelamin').text(jenisKelamin);
                    $('#alamat').text(response.data.alamat);
                    $('#agama').text(response.data.agama);
                    $('#no_hp').text(response.data.no_hp);
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
    $(document).ready(function() {
        $('#btn-close').click(function() {
            // Lakukan logika atau manipulasi data sebelum menampilkan modal
            // ...
            // Tampilkan modal
            $('#detailModal').modal('hide');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#exampleModalExcle').on('show.bs.modal', function() {
            // Kode yang ingin Anda jalankan saat modal ditampilkan
            console.log('Modal ditampilkan');
        });
    });
    $(document).ready(function() {
        $('#btn-closeexcel').click(function() {
            // Lakukan logika atau manipulasi data sebelum menampilkan modal
            // ...
            // Tampilkan modal
            $('#exampleModalExcle').modal('hide');
        });
    });
    $(document).ready(function() {
        $('#btn-closeexcel2').click(function() {
            // Lakukan logika atau manipulasi data sebelum menampilkan modal
            // ...
            // Tampilkan modal
            $('#exampleModalExcle').modal('hide');
        });
    });
</script>
