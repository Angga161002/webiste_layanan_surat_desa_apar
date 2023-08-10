<!DOCTYPE html>
<html>

<head>
    <title>Template Surat Keterangan</title>
    <style>
        /* Gaya untuk elemen-elemen surat */
        body {
            font-family: Arial, sans-serif;
            width: 700px;
            height: 1344px;
            padding: 38px 76px 76px 95px;
        }

        .container {
            width: 100%;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-image {
            max-width: 100px;
            /* Sesuaikan ukuran gambar */
            max-height: 100px;
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
            <br>
            KOP GAMPONG/LURAH<br>
            (Di mana orang tua/wali berdomisili)
        </div>

        <div class="content">
            <p>SURAT KETERANGAN KURANG MAMPU/MISKIN</p>
            <p>NOMOR………………………………/2014</p>

            <p>Yang bertanda tangan dibawah ini Kepala Geuchik Gampong/Lurah……………….Kecamatan, Kabupaten/Kota
                ……………………Provinsi……..dengan ini menerangkan bahwa,</p>

            <p>Nama orang Tua/ Wali : </p>
            <p>Tempat Tgl Lahir :</p>
            <p>Pekerjaan :</p>
            <p>Jabatan :</p>
            <p>Alamat lengkap sekarang :</p>
            <p>adalah Benar Orang Tua kandung dari</p>

            <p>Nama :</p>
            <p>Tempat Tgl Lahir :</p>
            <p>Diterima Pada Fakultas :</p>
            <p>Jurusan/ Prodi :</p>
            <p>Alamat lengkap sekarang :</p>

            <p>Yang kehidupan sosial ekonominya kurang mampu (MISKIN) dan berpenghasilan rata-rata perbulan Rp……..
                dengan tanggungan ……… orang anggota keluarga.</p>

            <p>Demikian surat keterangan ini kami keluarkan untuk pengurusan Beasiswa Bidik Misi angkatan 2013 melalui
                Universitas Syiah Kuala,</p>
            <p>……………………….2014</p>
            <p>Kepala Desa/Lurah</p>

            <p>Catatan: Redaksi ( isi keterangan ) dapat ditambahkan menurut kebutuhan setempat dengan tidak mengurangi
                contoh aslinya.</p>
        </div>
    </div>
</body>

</html>
<script>
    window.print();
</script>
