<!DOCTYPE html>
<html>

<head>
    <title>Template Surat Keterangan</title>
    <style>
        /* Gaya untuk elemen-elemen surat */
        body {
            font-family: "Times New Roman", Times, serif;
            width: 700px;
            font-size: 12pt;
            height: 544px;
            padding: 38px 76px 26px 95px;
        }

        .container {
            width: 100%;
            margin: auto;
        }

        .header {
            display: flex;
            align-items: center;
            border-bottom: 4px solid #000;
            /* Atur warna dan ukuran garis sesuai preferensi Anda */
            padding-bottom: 5px;
            /* Berikan sedikit jarak antara header dan konten di bawahnya */
            margin-bottom: 25px;
        }

        .brand-image {
            float: left;
            margin-right: 10px;
            height: 100px;
        }

        h3 {
            margin: 0;
            text-align: center;
        }

        h2 {
            margin: 0;
            text-align: center;
        }

        .content {
            font-size: 12pt;
        }

        /* Tambahkan gaya lainnya sesuai kebutuhan Anda */
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('kota-pariaman.png') }}" alt="Kota Pariaman" class="brand-image">
            <div class="header-content">
                <h3>PEMERINTAH KOTA PARIAMAN</h3>
                <h3>KECAMATAN PARIAMAN UTARA</h3>
                <h2>KELURAHAN DESA APAR</h2>
                <p style="margin: 0; text-align: center">Alamat : Jl. Imam Bonjol No. 44 Telp. (+62751- 92202) Pariaman
                    25511 </p>
            </div>
        </div>


        <div class="content">
            <p style="text-align: center; font-weight: bold; text-decoration: underline; margin-bottom: -14px">
                @if ($pengajuans->id_jenis_surat == 7)
                    SURAT KETERANGAN IJIN ORANG TUA / WALI
                @else
                    {{ $pengajuans->id_jenis_surat }}
                @endif
            </p>
            <p style="text-align: center;margin-bottom: 40px;">NOMORSKIOTW : {{ $pengajuans->no_dokumen_perjalanan }}/DA/KPU/KP/2023</p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kepala
                Desa Apar. Kecamatan Pariaman Utara, Kota
                Pariaman, Provinsi Sumatera Barat. Dengan ini menerangkan bahwa :</p><br>

            <table class="table">
                <tr>
                    <td>Nama orang Tua/ Wali</td>
                    <td>:</td>
                    <td>{{ $pengajuans->name_orang_tua }}</td>
                </tr>
                <tr>
                    <td>Tempat, Tgl Lahir</td>
                    <td>:</td>
                    <td>{{ $pengajuans->tempat_lahir }}, {{ $pengajuans->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $pengajuans->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $pengajuans->pekerjaan }}</td>
                </tr>
                <tr>
                    <td>Alamat lengkap sekarang</td>
                    <td>:</td>
                    <td>{{ $pengajuans->alamat }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Adalah Benar Orang Tua kandung dari</td>
                    <td>:</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $pengajuans->name }}</td>
                </tr>
                <tr>
                    <td>Tempat, Tgl Lahir</td>
                    <td>:</td>
                    <td>{{ $pengajuans->tempat_lahir }}, {{ $pengajuans->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Diterima Pada Fakultas</td>
                    <td>:</td>
                    <td>Politeknik Negeri Padang</td>
                </tr>
                <tr>
                    <td>Jurusan/ Prodi</td>
                    <td>:</td>
                    <td>Manajemen Informatika</td>
                </tr>
                <tr>
                    <td>Alamat lengkap sekarang</td>
                    <td>:</td>
                    <td>{{ $pengajuans->alamat }}</td>
                </tr>
            </table>

            <br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang kehidupan sosial ekonominya kurang mampu
                (MISKIN) dan berpenghasilan rata-rata perbulan Rp. 500.000
                dengan tanggungan 5 orang anggota keluarga.</p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan ini kami keluarkan
                untuk pengurusan Beasiswa Bidik Misi angkatan 2023 melalui
                Politeknik Negeri Padang,</p>
            <div style="text-align: right;">
                <p>Apar, Senin 13 Agustus 2023</p>
                <p style="margin-right: 40px;">Kepala Desa Apar</p>
                <img src="{{ asset('kota-pariaman.png') }}" alt="Kota Pariaman" style="margin-right: 35px;">
                <p style="font-weight: bold; text-decoration: underline;margin-right: 70px;">Hendrik</p>
            </div>

        </div>
    </div>
</body>

</html>
<script>
    window.print();
    // When printing is done, navigate back
    window.onafterprint = function() {
        window.history.back();
    };
</script>
