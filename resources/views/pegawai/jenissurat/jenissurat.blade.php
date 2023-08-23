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
                    <h1>Table Jenis Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('pegawai') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tabel Jenis Surat</li>
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
                            <h3 class="card-title">Table List Data Jenis Surat</h3>
                            <a href="{{ route('pegawai.addjenissurat') }}">
                                <button class="btn btn-sm btn-primary float-right"><img
                                        src="{{ asset('img') }}/plus-icon.svg" class="mr-1">Tambah Jenis
                                    Surat</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name Surat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jenissurats as $jenissurats)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jenissurats->name_surat }}</td>
                                            <td><a href="{{ route('pegawai.editjenissurat', ['jenissurats' => $jenissurats->id]) }}"
                                                    title="Edit">
                                                    <img src="{{ asset('img') }}/edit-line-dark.svg">
                                                </a>&nbsp
                                                <a type="button" id="btn-hapus" data-id={{ $jenissurats->id }}
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
                                        <th>Name Surat</th>
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
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).on('click', '#btn-hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('data-id');
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
                window.location = "/pegawai/table/jenissurat/hapus/" + link
            }
        })
    })
</script>
