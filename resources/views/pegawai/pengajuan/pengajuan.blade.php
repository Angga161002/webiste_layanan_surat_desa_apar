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
                                        {{-- <th>No Hp</th> --}}
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
                                            {{-- <td>{{ $pengajuans->no_hp }}</td> --}}
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
                                                <a href="{{ route('pegawai.editpengajuan', ['pengajuans' => $pengajuans->id]) }}"
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
                                        {{-- <th>No Hp</th> --}}
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
        <div class="modal-dialog modal-dialog-scrollable">
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
                            <th>Status</th>
                            <td>:</td>
                            <td id="status">
                            <td>
                        </tr>
                        <tr>
                            <th>No Dokumen</th>
                            <td>:</td>
                            <td id="no_dokumen_perjalanan">
                            <td>
                        </tr>
                        {{-- Surat Keterangan Tidak Mampu, Pengantar, Kelakuan Baik --}}
                        <tr id="status_orang_tuam" style="display: none">
                            <th>Status Orang Tua</th>
                            <td>:</td>
                            <td id="status_orang_tua">
                            <td>
                        </tr>
                        <tr id="name_orang_tuam" style="display: none">
                            <th>Nama Orang Tua</th>
                            <td>:</td>
                            <td id="name_orang_tua">
                            <td>
                        </tr>
                        <tr id="nik_orang_tuam" style="display: none">
                            <th>NIK Orang Tua</th>
                            <td>:</td>
                            <td id="nik_orang_tua">
                            <td>
                        </tr>
                        {{-- Surat Kelahiran --}}
                        <tr id="name_bayim" style="display: none">
                            <th>Nama Bayi</th>
                            <td>:</td>
                            <td id="name_bayi">
                            <td>
                        </tr>
                        <tr id="jenis_kelamin_bayim" style="display: none">
                            <th>Jenis Kelamin Bayi</th>
                            <td>:</td>
                            <td id="jenis_kelamin_bayi">
                            <td>
                        </tr>
                        <tr id="tempat_dilahirkanm" style="display: none">
                            <th>Tempat Dilahirkan</th>
                            <td>:</td>
                            <td id="tempat_dilahirkan">
                            <td>
                        </tr>
                        <tr id="tanggal_lahir_bayim" style="display: none">
                            <th>Tanggal Lahir Bayi</th>
                            <td>:</td>
                            <td id="tanggal_lahir_bayi">
                            <td>
                        </tr>
                        <tr id="waktu_lahirm" style="display: none">
                            <th>Waktu Lahir Bayi</th>
                            <td>:</td>
                            <td id="waktu_lahir">
                            <td>
                        </tr>
                        <tr id="jenis_kelahiranm" style="display: none">
                            <th>Jenis Kelahiran</th>
                            <td>:</td>
                            <td id="jenis_kelahiran">
                            <td>
                        </tr>
                        <tr id="kelahiran_kem" style="display: none">
                            <th>Kelahiran Ke</th>
                            <td>:</td>
                            <td id="kelahiran_ke">
                            <td>
                        </tr>
                        <tr id="penolong_kelahiranm" style="display: none">
                            <th>Penolong Kelahiran</th>
                            <td>:</td>
                            <td id="penolong_kelahiran">
                            <td>
                        </tr>
                        <tr id="berat_bayim" style="display: none">
                            <th>Berat Bayi</th>
                            <td>:</td>
                            <td id="berat_bayi">
                            <td>
                        </tr>
                        <tr id="panjang_bayim" style="display: none">
                            <th>Panjang Bayi</th>
                            <td>:</td>
                            <td id="panjang_bayi">
                            <td>
                        </tr>
                        {{-- Surat Kematian --}}
                        <tr id="name_jenazahm" style="display: none">
                            <th>Nama Jenazah</th>
                            <td>:</td>
                            <td id="name_jenazah">
                            <td>
                        </tr>
                        <tr id="tanggal_kematianm" style="display: none">
                            <th>Tanggal Kematian</th>
                            <td>:</td>
                            <td id="tanggal_kematian">
                            <td>
                        </tr>
                        <tr id="waktu_kematianm" style="display: none">
                            <th>Waktu Kematian</th>
                            <td>:</td>
                            <td id="waktu_kematian">
                            <td>
                        </tr>
                        <tr id="sebab_kematianm" style="display: none">
                            <th>Sebab Kematian</th>
                            <td>:</td>
                            <td id="sebab_kematian">
                            <td>
                        </tr>
                        <tr id="tempat_kematianm" style="display: none">
                            <th>Tempat Kematian</th>
                            <td>:</td>
                            <td id="tempat_kematian">
                            <td>
                        </tr>
                        <tr id="saksi_keterangan_kematianm" style="display: none">
                            <th>Saksi Keterangan Kematian</th>
                            <td>:</td>
                            <td id="saksi_keterangan_kematian">
                            <td>
                        </tr>
                        <tr id="status_ayahm" style="display: none">
                            <th>Status Ayah</th>
                            <td>:</td>
                            <td id="status_ayah">
                            <td>
                        </tr>
                        <tr id="name_ayahm" style="display: none">
                            <th>Nama Ayah</th>
                            <td>:</td>
                            <td id="name_ayah">
                            <td>
                        </tr>
                        <tr id="nik_ayahm" style="display: none">
                            <th>NIK Ayah</th>
                            <td>:</td>
                            <td id="nik_ayah">
                            <td>
                        </tr>
                        <tr id="status_ibum" style="display: none">
                            <th>Status Ibu</th>
                            <td>:</td>
                            <td id="status_ibu">
                            <td>
                        </tr>
                        <tr id="name_ibum" style="display: none">
                            <th>Name Ibu</th>
                            <td>:</td>
                            <td id="name_ibu">
                            <td>
                        </tr>
                        <tr id="nik_ibum" style="display: none">
                            <th>NIK Ibu</th>
                            <td>:</td>
                            <td id="nik_ibu">
                            <td>
                        </tr>
                        <tr id="saksi_1m" style="display: none">
                            <th>Saksi 1</th>
                            <td>:</td>
                            <td id="saksi_1">
                            <td>
                        </tr>
                        <tr id="saksi_2m" style="display: none">
                            <th>Saksi 2</th>
                            <td>:</td>
                            <td id="saksi_2">
                            <td>
                        </tr>
                        {{-- Surat Keterangan Usaha --}}
                        <tr id="jenis_usaham" style="display: none">
                            <th>Jenis Usaha</th>
                            <td>:</td>
                            <td id="jenis_usaha">
                            <td>
                        </tr>
                        {{-- Surat Keterangan Usaha, Pengantar, Kelakuan Baik, Beda Nama --}}
                        <tr id="keteranganm" style="display: none">
                            <th>Keperluan</th>
                            <td>:</td>
                            <td id="keterangan">
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
<script>
    // Fungsi untuk mencetak data menjadi surat desa
    function printSuratDesa(id) {
        console.log(id);
        $.ajax({
            url: '/pegawai/table/pengajuan/detail/' + id,
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
                window.location = "/pegawai/table/pengajuan/hapus/" + link
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
                url: '/pegawai/table/pengajuan/detail/' + id, // Ganti dengan URL yang sesuai
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
                    var statusText = response.data.status === "1" ? "Disetujui" : response
                        .data.status === "0" ? "Belum Disetujui" : "-";
                    $('#status').text(statusText);
                    $('#no_dokumen_perjalanan').text(response.data.no_dokumen_perjalanan || "-");

                    // Surat Keterangan Tidak Mampu, Pengantar, Kelakuan Baik
                    $('#status_orang_tua').text(response.data.status_orang_tua || "-");
                    $('#name_orang_tua').text(response.data.name_orang_tua || "-");
                    $('#nik_orang_tua').text(response.data.nik_orang_tua || "-");

                    //Surat Kelahiran
                    $('#name_bayi').text(response.data.name_bayi || "-");
                    var jenisKelaminBayi = response.data.jenis_kelamin_bayi === 'L' ?
                        'Laki-laki' : 'Perempuan';
                    $('#jenis_kelamin_bayi').text(jenisKelaminBayi);
                    $('#tempat_dilahirkan').text(response.data.tempat_dilahirkan || "-");
                    $('#tanggal_lahir_bayi').text(response.data.tanggal_lahir_bayi ?
                        new Date(response.data.tanggal_lahir_bayi).toLocaleDateString(
                            'id-ID', {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            }) : "-");
                    $('#waktu_lahir').text(response.data.waktu_lahir || "-");
                    $('#jenis_kelahiran').text(response.data.jenis_kelahiran || "-");
                    $('#kelahiran_ke').text(response.data.kelahiran_ke || "-");
                    $('#penolong_kelahiran').text(response.data.penolong_kelahiran || "-");
                    $('#berat_bayi').text(response.data.berat_bayi || "-");
                    $('#panjang_bayi').text(response.data.panjang_bayi || "-");

                    //Surat Kematian
                    $('#name_jenazah').text(response.data.name_jenazah || "-");
                    $('#tanggal_kematian').text(response.data.tanggal_kematian ? new Date(
                        response.data.tanggal_kematian).toLocaleDateString(
                    'id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }) : "-");
                    $('#waktu_kematian').text(response.data.waktu_kematian || "-");
                    $('#sebab_kematian').text(response.data.sebab_kematian || "-");
                    $('#tempat_kematian').text(response.data.tempat_kematian || "-");
                    $('#status_ayah').text(response.data.status_ayah || "-");
                    $('#name_ayah').text(response.data.name_ayah || "-");
                    $('#nik_ayah').text(response.data.nik_ayah || "-");
                    $('#status_ibu').text(response.data.status_ibu || "-");
                    $('#name_ibu').text(response.data.name_ibu || "-");
                    $('#nik_ibu').text(response.data.nik_ibu || "-");
                    $('#saksi_1').text(response.data.saksi_1 || "-");
                    $('#saksi_2').text(response.data.saksi_2 || "-");
                    $('#saksi_keterangan_kematian').text(response.data
                        .saksi_keterangan_kematian || "-");

                    //Surat Keterangan Usaha
                    $('#jenis_usaha').text(response.data.jenis_usaha || "-");

                    //Surat Keterangan Usaha, Pengantar, Kelakuan Baik, Beda Nama
                    $('#keterangan').text(response.data.keterangan || "-");
                    $('#no_hp').text(response.data.no_hp);

                    // Surat Keterangan Tidak Mampu, Ijin Orang Tua / Wali, Pernyataan Belum / Tidak Bekerja
                    var statusOrangTuasDiv = document.getElementById("status_orang_tuam");
                    var nameOrangTuasDiv = document.getElementById("name_orang_tuam");
                    var nikOrangTuasDiv = document.getElementById("nik_orang_tuam");
                    //Surat Kelahiran
                    var nameBayisDiv = document.getElementById("name_bayim");
                    var jenisKelaminBayisDiv = document.getElementById(
                        "jenis_kelamin_bayim");
                    var tempatDilahirkansDiv = document.getElementById(
                        "tempat_dilahirkanm");
                    var tanggalLahirBayisDiv = document.getElementById(
                        "tanggal_lahir_bayim");
                    var waktuLahirBayisDiv = document.getElementById("waktu_lahirm");
                    var jenisKelahiransDiv = document.getElementById("jenis_kelahiranm");
                    var kelahiranKesDiv = document.getElementById("kelahiran_kem");
                    var penolongKelahiransDiv = document.getElementById(
                        "penolong_kelahiranm");
                    var beratBayisDiv = document.getElementById("berat_bayim");
                    var panjangBayisDiv = document.getElementById("panjang_bayim");
                    // Surat Kematian
                    var nameJenazahsDiv = document.getElementById("name_jenazahm");
                    var tanggalKematiansDiv = document.getElementById("tanggal_kematianm");
                    var waktuKematiansDiv = document.getElementById("waktu_kematianm");
                    var sebabKematiansDiv = document.getElementById("sebab_kematianm");
                    var tempatKematiansDiv = document.getElementById("tempat_kematianm");
                    var saksiKetranganKematiansDiv = document.getElementById(
                        "saksi_keterangan_kematianm");
                    var statusAyahsDiv = document.getElementById("status_ayahm");
                    var nameAyahsDiv = document.getElementById("name_ayahm");
                    var nikAyahsDiv = document.getElementById("nik_ayahm");
                    var statusIbusDiv = document.getElementById("status_ibum");
                    var nameIbusDiv = document.getElementById("name_ibum");
                    var nikIbusDiv = document.getElementById("nik_ibum");
                    var saksi1sDiv = document.getElementById("saksi_1m");
                    var saksi2sDiv = document.getElementById("saksi_2m");
                    // Surat Keterangan Usaha
                    var jenisUsahasDiv = document.getElementById("jenis_usaham");
                    // Surat Keterangan Pengantar, Usaha, Kelakuan Baik, Beda Nama
                    var keterangansDiv = document.getElementById("keteranganm");

                    if (response.data.id_jenis_surat === 1 || response.data
                        .id_jenis_surat === 7 || response.data.id_jenis_surat === 9) {
                        statusOrangTuasDiv.style.display = "";
                        nameOrangTuasDiv.style.display = "";
                        nikOrangTuasDiv.style.display = "";
                        keterangansDiv.style.display = "";
                        nameBayisDiv.style.display = "none";
                        jenisKelaminBayisDiv.style.display = "none";
                        tempatDilahirkansDiv.style.display = "none";
                        tanggalLahirBayisDiv.style.display = "none";
                        waktuLahirBayisDiv.style.display = "none";
                        jenisKelahiransDiv.style.display = "none";
                        kelahiranKesDiv.style.display = "none";
                        penolongKelahiransDiv.style.display = "none";
                        beratBayisDiv.style.display = "none";
                        panjangBayisDiv.style.display = "none";
                        statusAyahsDiv.style.display = "none";
                        statusIbusDiv.style.display = "none";
                        nameAyahsDiv.style.display = "none";
                        nikAyahsDiv.style.display = "none";
                        nameIbusDiv.style.display = "none";
                        nikIbusDiv.style.display = "none";
                        saksi1sDiv.style.display = "none";
                        saksi2sDiv.style.display = "none";
                        nameJenazahsDiv.style.display = "none";
                        tanggalKematiansDiv.style.display = "none";
                        waktuKematiansDiv.style.display = "none";
                        sebabKematiansDiv.style.display = "none";
                        tempatKematiansDiv.style.display = "none";
                        saksiKetranganKematiansDiv.style.display = "none";
                        saksi1sDiv.style.display = "none";
                        saksi2sDiv.style.display = "none";
                        jenisUsahasDiv.style.display = "none";
                    } else if (response.data.id_jenis_surat === 2) {
                        nameOrangTuasDiv.style.display = "none";
                        nikOrangTuasDiv.style.display = "none";
                        nameBayisDiv.style.display = "";
                        jenisKelaminBayisDiv.style.display = "";
                        tempatDilahirkansDiv.style.display = "";
                        tanggalLahirBayisDiv.style.display = "";
                        waktuLahirBayisDiv.style.display = "";
                        jenisKelahiransDiv.style.display = "";
                        kelahiranKesDiv.style.display = "";
                        penolongKelahiransDiv.style.display = "";
                        beratBayisDiv.style.display = "";
                        panjangBayisDiv.style.display = "";
                        statusAyahsDiv.style.display = "";
                        statusIbusDiv.style.display = "";
                        nameAyahsDiv.style.display = "";
                        nikAyahsDiv.style.display = "";
                        nameIbusDiv.style.display = "";
                        nikIbusDiv.style.display = "";
                        statusOrangTuasDiv.style.display = "none";
                        keterangansDiv.style.display = "none";
                        nameJenazahsDiv.style.display = "none";
                        tanggalKematiansDiv.style.display = "none";
                        waktuKematiansDiv.style.display = "none";
                        sebabKematiansDiv.style.display = "none";
                        tempatKematiansDiv.style.display = "none";
                        saksiKetranganKematiansDiv.style.display = "none";
                        saksi1sDiv.style.display = "none";
                        saksi2sDiv.style.display = "none";
                        jenisUsahasDiv.style.display = "none";
                    } else if (response.data.id_jenis_surat === 3) {
                        nameOrangTuasDiv.style.display = "none";
                        nikOrangTuasDiv.style.display = "none";
                        nameJenazahsDiv.style.display = "";
                        tanggalKematiansDiv.style.display = "";
                        waktuKematiansDiv.style.display = "";
                        sebabKematiansDiv.style.display = "";
                        tempatKematiansDiv.style.display = "";
                        saksiKetranganKematiansDiv.style.display = "";
                        statusAyahsDiv.style.display = "";
                        statusIbusDiv.style.display = "";
                        nameAyahsDiv.style.display = "";
                        nikAyahsDiv.style.display = "";
                        nameIbusDiv.style.display = "";
                        nikIbusDiv.style.display = "";
                        saksi1sDiv.style.display = "";
                        saksi2sDiv.style.display = "";
                        nameBayisDiv.style.display = "none";
                        jenisKelaminBayisDiv.style.display = "none";
                        tempatDilahirkansDiv.style.display = "none";
                        tanggalLahirBayisDiv.style.display = "none";
                        waktuLahirBayisDiv.style.display = "none";
                        jenisKelahiransDiv.style.display = "none";
                        kelahiranKesDiv.style.display = "none";
                        penolongKelahiransDiv.style.display = "none";
                        beratBayisDiv.style.display = "none";
                        panjangBayisDiv.style.display = "none";
                        statusOrangTuasDiv.style.display = "none";
                        keterangansDiv.style.display = "none";
                        jenisUsahasDiv.style.display = "none";
                    } else if (response.data.id_jenis_surat === 4) {
                        nameJenazahsDiv.style.display = "none";
                        tanggalKematiansDiv.style.display = "none";
                        waktuKematiansDiv.style.display = "none";
                        sebabKematiansDiv.style.display = "none";
                        tempatKematiansDiv.style.display = "none";
                        saksiKetranganKematiansDiv.style.display = "none";
                        statusAyahsDiv.style.display = "none";
                        statusIbusDiv.style.display = "none";
                        saksi1sDiv.style.display = "none";
                        saksi2sDiv.style.display = "none";
                        nameBayisDiv.style.display = "none";
                        jenisKelaminBayisDiv.style.display = "none";
                        tempatDilahirkansDiv.style.display = "none";
                        tanggalLahirBayisDiv.style.display = "none";
                        waktuLahirBayisDiv.style.display = "none";
                        jenisKelahiransDiv.style.display = "none";
                        kelahiranKesDiv.style.display = "none";
                        penolongKelahiransDiv.style.display = "none";
                        beratBayisDiv.style.display = "none";
                        panjangBayisDiv.style.display = "none";
                        statusOrangTuasDiv.style.display = "none";
                        keterangansDiv.style.display = "none";
                        jenisUsahasDiv.style.display = "";
                        nameOrangTuasDiv.style.display = "none";
                        nikOrangTuasDiv.style.display = "none";
                        nameAyahsDiv.style.display = "none";
                        nikAyahsDiv.style.display = "none";
                        nameIbusDiv.style.display = "none";
                        nikIbusDiv.style.display = "none";
                    } else if (response.data.id_jenis_surat === 5 || response.data
                        .id_jenis_surat === 6 || response.data.id_jenis_surat === 8) {
                        nameJenazahsDiv.style.display = "none";
                        tanggalKematiansDiv.style.display = "none";
                        waktuKematiansDiv.style.display = "none";
                        sebabKematiansDiv.style.display = "none";
                        tempatKematiansDiv.style.display = "none";
                        saksiKetranganKematiansDiv.style.display = "none";
                        statusAyahsDiv.style.display = "none";
                        statusIbusDiv.style.display = "none";
                        saksi1sDiv.style.display = "none";
                        saksi2sDiv.style.display = "none";
                        nameBayisDiv.style.display = "none";
                        jenisKelaminBayisDiv.style.display = "none";
                        tempatDilahirkansDiv.style.display = "none";
                        tanggalLahirBayisDiv.style.display = "none";
                        waktuLahirBayisDiv.style.display = "none";
                        jenisKelahiransDiv.style.display = "none";
                        kelahiranKesDiv.style.display = "none";
                        penolongKelahiransDiv.style.display = "none";
                        beratBayisDiv.style.display = "none";
                        panjangBayisDiv.style.display = "none";
                        statusOrangTuasDiv.style.display = "none";
                        keterangansDiv.style.display = "";
                        jenisUsahasDiv.style.display = "none";
                        nameOrangTuasDiv.style.display = "none";
                        nikOrangTuasDiv.style.display = "none";
                        nameAyahsDiv.style.display = "none";
                        nikAyahsDiv.style.display = "none";
                        nameIbusDiv.style.display = "none";
                        nikIbusDiv.style.display = "none";
                    } else {
                        nameJenazahsDiv.style.display = "none";
                        tanggalKematiansDiv.style.display = "none";
                        waktuKematiansDiv.style.display = "none";
                        sebabKematiansDiv.style.display = "none";
                        tempatKematiansDiv.style.display = "none";
                        saksiKetranganKematiansDiv.style.display = "none";
                        statusAyahsDiv.style.display = "";
                        statusIbusDiv.style.display = "";
                        saksi1sDiv.style.display = "none";
                        saksi2sDiv.style.display = "none";
                        nameBayisDiv.style.display = "none";
                        jenisKelaminBayisDiv.style.display = "none";
                        tempatDilahirkansDiv.style.display = "none";
                        tanggalLahirBayisDiv.style.display = "none";
                        waktuLahirBayisDiv.style.display = "none";
                        jenisKelahiransDiv.style.display = "none";
                        kelahiranKesDiv.style.display = "none";
                        penolongKelahiransDiv.style.display = "none";
                        beratBayisDiv.style.display = "none";
                        panjangBayisDiv.style.display = "none";
                        statusOrangTuasDiv.style.display = "none";
                        keterangansDiv.style.display = "none";
                        jenisUsahasDiv.style.display = "none";
                        nameOrangTuasDiv.style.display = "none";
                        nikOrangTuasDiv.style.display = "none";
                        nameAyahsDiv.style.display = "none";
                        nikAyahsDiv.style.display = "none";
                        nameIbusDiv.style.display = "none";
                        nikIbusDiv.style.display = "none";
                    }
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
