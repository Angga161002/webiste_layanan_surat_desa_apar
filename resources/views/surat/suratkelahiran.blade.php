<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="{{ asset('kota-pariaman.png') }}" />
    <title>Surat Keterangan Lahir</title>
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
                <p style="margin: 0;"><b>Jln Wr Soepratman Desa Apar Kode Pos: 25522</b></p>
            </div>
        </div>



        <div class="content">
            <p style="text-align: center; font-weight: bold; text-decoration: underline; margin-bottom: -14px">
                @if ($pengajuans->id_jenis_surat == 2)
                    SURAT KETERANGAN LAHIR
                @else
                    {{ $pengajuans->id_jenis_surat }}
                @endif
            </p>
            <p style="text-align: center;margin-bottom: 40px;"><b>Nomor : {{ $pengajuans->no_dokumen_perjalanan }}
                    /SKL/
                    DS-AP /VIII/2023</b></p>

            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini Kepala
                Desa Apar Kecamatan Pariaman Utara Kota
                Pariaman Provinsi Sumatera Barat. Menerangkan bahwa :</p><br>

            <table class="table" style="margin-left: 40px">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><b>{{ ucfirst($pengajuans->name) }}</b></td>
                </tr>
                <tr>
                    <td>Tempat, Tgl Lahir</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->tempat_lahir) }}, {{ $pengajuans->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if ($pengajuans->jenis_kelamin === 'L')
                            Laki-laki
                        @elseif ($pengajuans->jenis_kelamin === 'P')
                            Perempuan
                        @endif
                    </td>

                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->agama) }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->pekerjaan) }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->alamat) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Telah melahirkan seorang anak pada</td>
                    <td>:</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Hari, Tanggal</td>
                    <td>:</td>
                    <td>{{ date('d', strtotime($pengajuans->tanggal_lahir_bayi)) }}, {{ $pengajuans->tanggal_lahir_bayi }}</td>
                </tr>
                <tr>
                    <td>Waktu Lahir</td>
                    <td>:</td>
                    <td>{{ $pengajuans->waktu_lahir }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->name_bayi) }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        @if ($pengajuans->jenis_kelamin_bayi === 'L')
                            Laki-laki
                        @elseif ($pengajuans->jenis_kelamin_bayi === 'P')
                            Perempuan
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Berat Bayi</td>
                    <td>:</td>
                    <td>{{ $pengajuans->berat_bayi }}</td>
                </tr>
                <tr>
                    <td>Panjang Bayi</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->panjang_bayi) }}</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->tempat_dilahirkan) }}</td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->kelahiran_ke) }}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ ucfirst($pengajuans->agama) }}</td>
                </tr>
            </table>

            <br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menerangkan bahwa nama yang tersebut diatas
                adalah warga yang berdomisili Desa Apar menurut pendataan kami.</p>

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
