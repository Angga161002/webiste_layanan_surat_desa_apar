<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="{{ asset('kota-pariaman.png') }}" />
    <title>Surat Keterangan Meninggal Dunia</title>
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
            <div class="header-content" style="text-align: center; margin-left: 50px">
                <h2>PEMERINTAH KOTA PARIAMAN</h2>
                <h2>KECAMATAN PARIAMAN UTARA</h2>
                <h2>DESA APAR</h2>
                <p style="margin: 0;"><b>JLN WR Soepratman Desa Apar</b></p>
            </div>
        </div>



        <div class="content">
            <p style="text-align: center; font-weight: bold; text-decoration: underline; margin-bottom: -14px">
                @if ($pengajuans->id_jenis_surat == 3)
                    SURAT KETERANGAN MENINGGAL DUNIA
                @else
                    {{ $pengajuans->id_jenis_surat }}
                @endif
            </p>
            <p style="text-align: center;margin-bottom: 40px;"><b>Nomor : {{ $pengajuans->no_dokumen_perjalanan }}
                    /DS-AP/SKMD/VIII/2023</b></p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kepala
                Desa Apar Kecamatan Pariaman Utara Kota
                Pariaman Provinsi Sumatera Barat. Dengan ini menerangkan bahwa :</p><br>

            <table class="table" style="margin-left: 40px">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><b>{{ ucfirst($pengajuans->name_jenazah) }}</b></td>
                </tr>
                <tr>
                    <td>Sebab Kematian</td>
                    <td>:</td>
                    <td><b>{{ ucfirst($pengajuans->sebab_kematian) }}</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Telah Meninggal Dunia Pada</td>
                    <td>:</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hari</td>
                    <td>:</td>
                    <td>{{ date('d', strtotime($pengajuans->tanggal_kematian)) }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td>{{ $pengajuans->tanggal_kematian }}</td>
                </tr>
                <tr>
                    <td>Dikebumikan</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->tempat_kematian) }}</td>
                </tr>
            </table>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menerangkan bahwa nama yang tersebut dibawah
                ini adalah saksi yang menerangkan kematian, saksi 1 dan saksi 2 :</p>
            <table class="table" style="margin-left: 40px">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Saksi Keterangan Kematian</td>
                    <td>:</td>
                    <td><b>{{ ucfirst($pengajuans->saksi_keterangan_kematian) }}</b></td>
                </tr>
                <tr>
                    <td>Saksi 1</td>
                    <td>:</td>
                    <td><b>{{ ucfirst($pengajuans->saksi_1) }}</b></td>
                </tr>
                <tr>
                    <td>Saksi 2</td>
                    <td>:</td>
                    <td><b>{{ ucfirst($pengajuans->saksi_2) }}</b></td>
                </tr>
            </table>

            <br>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan ini kami berikan
                kepada yang bersangkutan untuk dapat dipergunakan sebagai mana perlunya.</p>
            <div style="text-align: right;">
                @php
                    $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    $indonesianMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    $currentMonthIndex = date('n') - 1; // January is 1, so we subtract 1 to get the correct index
                    $indonesianMonth = $indonesianMonths[$currentMonthIndex];
                @endphp

                <p>Desa Apar, {{ date('d', time()) }} {{ $indonesianMonth }} {{ date('Y', time()) }}</p>

                <p style="margin-right: 40px;">Kepala Desa Apar</p>
                <img src="{{ asset('ttd-kepsek.png') }}" alt="Kota Pariaman"
                    style="margin-right: 35px;width: 120px; height: 100px;">
                <p style="font-weight: bold;margin-right: 70px;">Hendrik</p>
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
