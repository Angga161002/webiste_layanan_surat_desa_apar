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
                    <h1>Table Pengajuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tabel Pengajuan</li>
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
                            <h3 class="card-title">Table List Data Pengajuan</h3>
                            <a href="{{ route('penduduk.tambahpengajuan') }}">
                                <button class="btn btn-sm btn-primary float-right"><img
                                        src="{{ asset('img') }}/plus-icon.svg" class="mr-1">Tambah Pengajuan</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Jenis Surat</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengajuans as $pengajuans)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pengajuans->nik_penduduk }}</td>
                                            <td>{{ $pengajuans->name }}</td>
                                            <td>{{ $pengajuans->name_surat }}</td>
                                            <td>{{ $pengajuans->no_hp }}</td>
                                            <td>
                                                <span
                                                    style="background-color: {{ $pengajuans->status === '0' ? '#8B0000' : '#1E7E34' }}; border-radius: 12px; padding: 6px; font-size: 15px; color: white; display: inline-block;">
                                                    @if ($pengajuans->status === '0')
                                                        Belum Disetujui
                                                    @elseif ($pengajuans->status === '1')
                                                        Disetujui
                                                    @endif
                                                </span>
                                            </td>
                                            <td><a type="button" class="btn-detail" data-id={{ $pengajuans->id }}
                                                    title="Detail">
                                                    <img src="{{ asset('img') }}/eye-line-dark.svg">
                                                </a>&nbsp
                                                <a href="{{ route('penduduk.editpengajuan', ['pengajuans' => $pengajuans->id]) }}"
                                                    title="Edit">
                                                    <img src="{{ asset('img') }}/edit-line-dark.svg">
                                                </a>&nbsp
                                                <a type="button" class="btn-hapus" data-id={{ $pengajuans->id }}
                                                    title="Delete">
                                                    <img src="{{ asset('img') }}/delete-icon.svg">
                                                </a>&nbsp
                                                @if ($pengajuans->status === '0')
                                                    <a type="button" class="btn-print" data-id="{{ $pengajuans->id }}"
                                                        title="Print">
                                                    </a>
                                                @else
                                                    <a href="#" class="btn-print" role="button"
                                                        data-id="{{ $pengajuans->id }}" title="Cetak"
                                                        onclick="printSuratDesa({{ $pengajuans->id }})">
                                                        <img src="{{ asset('img') }}/print-icon.svg"
                                                            style="color: #6c757d;">
                                                    </a>
                                                    {{-- <a type="button" title="Print" onclick="printToPDF()">
                                                        <img src="{{ asset('img') }}/print-icon.svg"
                                                            style="color: #6c757d;">
                                                    </a> --}}
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach ()
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Jenis Surat</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
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
                    <h5 class="modal-title text-center" id="modalDetailLabel">Detail Pengajuan</h5>
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
                            <th>Name Surat</th>
                            <td>:</td>
                            <td id="name_surat"></td>
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
<!-- /.content-wrapper -->
@include('layouts.footer')
<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi untuk mencetak data menjadi surat desa
    function printSuratDesa(id) {
        console.log(id);
        $.ajax({
            url: '/penduduk/table/pengajuan/detail/' + id,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response) {
                var suratDesaContent = [{
                        text: 'KOP GAMPONG/LURAH\nKECAMATAN/LURAH\nKELURAHAN/LURAH\n( Di mana orang tua/wali berdomisili )',
                        style: 'header'
                    },
                    '\n',
                    {
                        canvas: [{
                            type: 'line',
                            x1: 0,
                            y1: 5,
                            x2: 515, // Lebar halaman - sesuaikan dengan lebar halaman Anda
                            y2: 5,
                            lineWidth: 2,
                            lineColor: 'black',
                        }]
                    },
                    '\n',
                    {
                        text: response.data.name_surat,
                        style: 'header'
                    },
                    // {
                    //     canvas: [{
                    //         type: 'line',
                    //         x1: 0,
                    //         y1: 0,
                    //         x2: 220, // Lebar halaman - sesuaikan dengan lebar halaman Anda
                    //         y2: 0,
                    //         lineWidth: 2,
                    //         lineColor: 'black',
                    //     }]
                    // },
                    {
                        text: 'NOMOR………………………………/Tahun',
                        style: 'header'
                    },
                    '\n\n',
                    {
                        text: 'Yang bertanda tangan dibawah ini Kepala Geuchik Gampong/Lurah……………….Kecamatan, Kabupaten/Kota ……………………Provinsi……..dengan ini menerangkan bahwa,',
                        style: 'content'
                    },
                    '\n\n',
                    '',
                    'Nama orang Tua/ Wali                                : ' + response.data.name,
                    'Tempat Tgl Lahir                                          : ' + response.data
                    .tempat_lahir + ', ' + response.data.tanggal_lahir,
                    'Pekerjaan                                                       : ' + response.data
                    .pekerjaan,
                    'Jabatan                                                          : ',
                    'Alamat lengkap sekarang                           : ' + response.data.alamat,
                    '\n\n',
                    'adalah Benar Orang Tua kandung dari',
                    'Nama                                                              : ',
                    'Tempat Tgl Lahir                                           : ',
                    'Diterima Pada Fakultas                               : ',
                    'Jurusan/ Prodi                                              : ',
                    'Alamat lengkap sekarang                           : ',
                    '\n\n',
                    'Yang kehidupan sosial ekonominya kurang mampu (MISKIN) dan berpenghasilan rata-rata perbulan Rp…….. dengan tanggungan ……… orang anggota keluarga.',
                    '\n\n',
                    'Demikian surat keterangan ini kami keluarkan untuk pengurusan Beasiswa Bidik Misi angkatan [Tahun Angkatan] melalui [Nama Universitas],',
                    '[Tempat dan Tanggal Penerbitan]',
                    '\n\n',
                    'Kepala Desa/Lurah',
                    '\n\n',
                    'Catatan: Redaksi ( isi keterangan ) dapat ditambahkan sesuai kebutuhan setempat tanpa mengurangi contoh aslinya.',
                ];

                var docDefinition = {
                    content: suratDesaContent,
                    styles: {
                        header: {
                            bold: true,
                            alignment: 'center',
                            fontSize: 12
                        },
                        content: {
                            fontSize: 10
                        }
                    }
                };

                pdfMake.createPdf(docDefinition).download('Surat Kelahiran.pdf');
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
</script>
<script>
    $(document).on('click', '.btn-hapus', function(e) {
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
                window.location = "/penduduk/table/pengajuan/hapus/" + link
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        $('.btn-detail').click(function() {
            var id = $(this).attr('data-id');
            console.log(id);

            $.ajax({
                url: '/penduduk/table/pengajuan/detail/' + id, // Ganti dengan URL yang sesuai
                type: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    // console.log(response.data.jml_pemasukan);
                    $('#detailContent').html(response);
                    $('#detailModal').modal('show');
                    $('#nik').text(response.data.nik_penduduk);
                    $('#name').text(response.data.name);
                    $('#name_surat').text(response.data.name_surat);
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
