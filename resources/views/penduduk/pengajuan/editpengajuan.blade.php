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
                    <h1>Form Edit Pengajuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Form Edit Pengajuan</li>
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
                            <h3 class="card-title">Edit Data Form Pengajuan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('penduduk.ubahpengajuan') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        value="{{ $pengajuans->id }}">
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" disabled value="{{ $penduduk->nik }}"
                                        class="form-control" id="nik" placeholder="Enter NIK Anda" required
                                        pattern="[0-9]{16}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="nik_penduduk" disabled value="{{ $penduduk->nik }}"
                                        class="form-control" id="nik_penduduk" placeholder="Enter NIK Anda" required
                                        pattern="[0-9]{16}">
                                </div>
                                <div class="form-group">
                                    <label for="id_jenis_surat">Pilih Jenis Surat</label>
                                    <select required name="id_jenis_surat" class="form-control" id="id_jenis_surat"
                                        onchange="toggleJenisSurat()">
                                        <option value="">Pilih Jenis Surat</option>
                                        <option value="1"
                                            {{ $pengajuans->id_jenis_surat === 1 ? 'selected' : '' }}>Surat Keterangan
                                            Tidak Mampu</option>
                                        <option value="2"
                                            {{ $pengajuans->id_jenis_surat === 2 ? 'selected' : '' }}>Surat Kelahiran
                                        </option>
                                        <option value="3"
                                            {{ $pengajuans->id_jenis_surat === 3 ? 'selected' : '' }}>Surat Kematian
                                        </option>
                                        <option value="4"
                                            {{ $pengajuans->id_jenis_surat === 4 ? 'selected' : '' }}>Surat Keterangan
                                            Usaha</option>
                                        <option value="5"
                                            {{ $pengajuans->id_jenis_surat === 5 ? 'selected' : '' }}>Surat Keterangan
                                            Kelakuan Baik</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" disabled required value="{{ $penduduk->name }}"
                                        class="form-control" id="name" placeholder="Enter Name Anda">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" disabled required
                                        value="{{ $penduduk->tempat_lahir }}" class="form-control" id="tempat_lahir"
                                        placeholder="Enter Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" required name="tanggal_lahir" disabled
                                        value="{{ $penduduk->tanggal_lahir }}" class="form-control" id="tanggal_lahir"
                                        placeholder="Enter Tanggal lahir Anda">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" required name="alamat" disabled
                                        value="{{ $penduduk->alamat }}" class="form-control" id="alamat"
                                        placeholder="Enter Alamat Anda">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" required name="pekerjaan" disabled
                                        value="{{ $penduduk->pekerjaan }}" class="form-control" id="pekerjaan"
                                        placeholder="Enter Pekerjaan">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="warga_negara">Warga Negara</label>
                                    <select required name="warga_negara" class="form-control" id="warga_negara">
                                        <option value="">Pilih Warga Negara Anda</option>
                                        <option value="wni">WNI</option>
                                        <option value="wna">WNA</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select required name="agama" disabled class="form-control" id="agama">
                                        <option value="">Pilih Agama Anda</option>
                                        <option value="islam" {{ $penduduk->agama === 'islam' ? 'selected' : '' }}>
                                            Islam</option>
                                        <option value="kristen"
                                            {{ $penduduk->agama === 'kristen' ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="hindu" {{ $penduduk->agama === 'hindu' ? 'selected' : '' }}>
                                            Hindu</option>
                                        <option value="buddha" {{ $penduduk->agama === 'buddha' ? 'selected' : '' }}>
                                            Buddha</option>
                                        <option value="konghucu"
                                            {{ $penduduk->agama === 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>
                                {{-- Surat Keterangan Tidak Mampu, Ijin Orang Tua / Wali, Pernyataan Belum / Tidak Bekerja --}}

                                <div class="form-group" id="status_orang_tuas" style="display: none">
                                    <label for="status_orang_tua">Status Orang Tua *</label>
                                    <select name="status_orang_tua" class="form-control" id="status_orang_tua">
                                        <option value="">Pilih Status Orang Tua</option>
                                        <option value="masih hidup"
                                            {{ $pengajuans->agama === 'masih hidup' ? 'selected' : '' }}>Masih Hidup
                                        </option>
                                        <option value="meninggal/luar desa"
                                            {{ $pengajuans->agama === 'meninggal/luar desa' ? 'selected' : '' }}>
                                            Meninggal/Luar Desa</option>
                                    </select>
                                </div>
                                <div class="form-group" id="name_orang_tuas" style="display: none">
                                    <label for="name_orang_tua">Nama Orang Tua *</label>
                                    <input type="text" name="name_orang_tua" class="form-control"
                                        id="name_orang_tua" value="{{ $pengajuans->name_orang_tua }}"
                                        placeholder="Enter Name Orang Tua">
                                </div>
                                <div class="form-group" id="nik_orang_tuas" style="display: none">
                                    <label for="nik_orang_tua">NIK Orang Tua *</label>
                                    <input type="number" name="nik_orang_tua" class="form-control"
                                        id="nik_orang_tua" value="{{ $pengajuans->nik_orang_tua }}"
                                        placeholder="Enter NIK Orang Tua">
                                </div>

                                {{-- Surat Kelahiran --}}

                                <div class="form-group" id="name_bayis" style="display: none">
                                    <label for="name_bayi">Nama Bayi (Anak) *</label>
                                    <input type="text" name="name_bayi" class="form-control" id="name_bayi"
                                        value="{{ $pengajuans->name_bayi }}" placeholder="Enter Nama Bayi">
                                </div>
                                <div class="form-group" id="jenis_kelamin_bayis" style="display: none">
                                    <label for="jenis_kelamin_bayi">Jenis Kelamin Bayi *</label>
                                    <select name="jenis_kelamin_bayi" class="form-control" id="jenis_kelamin_bayi">
                                        <option value="">Pilih Jenis Kelamin Bayi</option>
                                        <option value="L"
                                            {{ $pengajuans->jenis_kelamin_bayi === 'L' ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="P"
                                            {{ $pengajuans->jenis_kelamin_bayi === 'P' ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group" id="tempat_dilahirkans" style="display: none">
                                    <label for="tampat_dilahirkan">Tempat Dilahirkan *</label>
                                    <select name="tempat_dilahirkan" class="form-control" id="tempat_dilahirkan">
                                        <option value="">Pilih Tempat Dilahirkan</option>
                                        <option value="rs/rsb"
                                            {{ $pengajuans->tempat_dilahirkan === 'rs/rsb' ? 'selected' : '' }}>RS/RSB
                                        </option>
                                        <option value="puskesmas"
                                            {{ $pengajuans->tempat_dilahirkan === 'puskesmas' ? 'selected' : '' }}>
                                            Puskesmas</option>
                                        <option value="polindes"
                                            {{ $pengajuans->tempat_dilahirkan === 'polindes' ? 'selected' : '' }}>
                                            Polindes</option>
                                        <option value="rumah"
                                            {{ $pengajuans->tempat_dilahirkan === 'rumah' ? 'selected' : '' }}>Rumah
                                        </option>
                                        <option value="lainnya"
                                            {{ $pengajuans->tempat_dilahirkan === 'lainnya' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group" id="tanggal_lahir_bayis" style="display: none">
                                    <label for="tanggal_lahir_bayi">Tanggal Lahir Bayi *</label>
                                    <input type="date" name="tanggal_lahir_bayi" class="form-control"
                                        id="tanggal_lahir_bayi" value="{{ $pengajuans->tanggal_lahir_bayi }}"
                                        placeholder="Enter Tanggal Lahir Bayi">
                                </div>
                                <div class="form-group" id="waktu_lahir_bayis" style="display: none">
                                    <label for="waktu_lahir_bayi">Waktu Lahir Bayi *</label>
                                    <input type="time" name="waktu_lahir_bayi" class="form-control"
                                        id="waktu_lahir_bayi" value="{{ $pengajuans->waktu_lahir }}"
                                        placeholder="Enter Waktu Lahir Bayi">
                                </div>
                                <div class="form-group" id="jenis_kelahirans" style="display: none">
                                    <label for="jenis_kelahiran">Jenis Kelahiran *</label>
                                    <select name="jenis_kelahiran" class="form-control" id="jenis_kelahiran">
                                        <option value="">Pilih Jenis Kelahiran</option>
                                        <option value="tunggal"
                                            {{ $pengajuans->jenis_kelahiran === 'tunggal' ? 'selected' : '' }}>Tunggal
                                        </option>
                                        <option value="kembar"
                                            {{ $pengajuans->jenis_kelahiran === 'kembar' ? 'selected' : '' }}>Kembar
                                        </option>
                                        <option value="kembar 3"
                                            {{ $pengajuans->jenis_kelahiran === 'kembar 3' ? 'selected' : '' }}>Kembar
                                            3</option>
                                        <option value="kembar 4"
                                            {{ $pengajuans->jenis_kelahiran === 'kembar 4' ? 'selected' : '' }}>Kembar
                                            4</option>
                                        <option value="lainnya"
                                            {{ $pengajuans->jenis_kelahiran === 'lainnya' ? 'selected' : '' }}>Lainnya
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group" id="kelahiran_kes" style="display: none">
                                    <label for="kelahiran_ke">Kelahiran Ke *</label>
                                    <input type="text" name="kelahiran_ke" class="form-control" id="kelahiran_ke"
                                        value="{{ $pengajuans->kelahiran_ke }}" placeholder="Enter Kelahiran Ke">
                                </div>
                                <div class="form-group" id="penolong_kelahirans" style="display: none">
                                    <label for="penolong_kelahiran">Penolong Kelahiran *</label>
                                    <select name="penolong_kelahiran" class="form-control" id="penolong_kelahiran">
                                        <option value="">Pilih Penolong Kelahiran</option>
                                        <option value="dokter"
                                            {{ $pengajuans->penolong_kelahiran === 'dokter' ? 'selected' : '' }}>Dokter
                                        </option>
                                        <option value="bidan/perawat"
                                            {{ $pengajuans->penolong_kelahiran === 'bidan/perawat' ? 'selected' : '' }}>
                                            Bidan/Perawat</option>
                                        <option value="dukun"
                                            {{ $pengajuans->penolong_kelahiran === 'dukun' ? 'selected' : '' }}>Dukun
                                        </option>
                                        <option value="lainnya"
                                            {{ $pengajuans->penolong_kelahiran === 'lainnya' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group" id="berat_bayis" style="display: none">
                                    <label for="berat_bayi">Berat Bayi *</label>
                                    <input type="text" name="berat_bayi" class="form-control" id="berat_bayi"
                                        value="{{ $pengajuans->berat_bayi }}" placeholder="Enter Berat Bayi">
                                </div>
                                <div class="form-group" id="panjang_bayis" style="display: none">
                                    <label for="panjang_bayi">Panjang Bayi *</label>
                                    <input type="text" name="panjang_bayi" class="form-control" id="panjang_bayi"
                                        value="{{ $pengajuans->panjang_bayi }}" placeholder="Enter Panjang Bayi">
                                </div>

                                {{-- Surat Kematian --}}

                                <div class="form-group" id="name_jenazahs" style="display: none">
                                    <label for="name_jenazah">Nama Jenazah *</label>
                                    <input type="text" name="name_jenazah" class="form-control" id="name_jenazah"
                                        value="{{ $pengajuans->name_jenazah }}" placeholder="Enter Nama Jenazah">
                                </div>
                                <div class="form-group" id="tanggal_kematians" style="display: none">
                                    <label for="tanggal_kematian">Tanggal Kematian *</label>
                                    <input type="date" name="tanggal_kematian" class="form-control"
                                        id="tanggal_kematian" value="{{ $pengajuans->tanggal_kematian }}"
                                        placeholder="Enter Tanggal Lahir Bayi">
                                </div>
                                <div class="form-group" id="waktu_kematians" style="display: none">
                                    <label for="waktu_kematian">Waktu Kematian *</label>
                                    <input type="time" name="waktu_kematian" class="form-control"
                                        id="waktu_kematian" value="{{ $pengajuans->waktu_kematian }}"
                                        placeholder="Enter Waktu Kematian">
                                </div>
                                <div class="form-group" id="sebab_kematians" style="display: none">
                                    <label for="sebab_kematian">Sebab Kematian *</label>
                                    <select name="sebab_kematian" class="form-control" id="sebab_kematian">
                                        <option value="">Pilih Sebab Kematian</option>
                                        <option value="sakis biasa / tua"
                                            {{ $pengajuans->sebab_kematian === 'sakis biasa / tua' ? 'selected' : '' }}>
                                            Sakit Biasa / Tua</option>
                                        <option value="wabah penyakit"
                                            {{ $pengajuans->sebab_kematian === 'wabah penyakit' ? 'selected' : '' }}>
                                            Wabah Penyakit</option>
                                        <option value="kecelakaan"
                                            {{ $pengajuans->sebab_kematian === 'kecelakaan' ? 'selected' : '' }}>
                                            Kecelakaan</option>
                                        <option value="kriminalitas"
                                            {{ $pengajuans->sebab_kematian === 'kriminalitas' ? 'selected' : '' }}>
                                            Kriminalitas</option>
                                        <option value="bunuh diri"
                                            {{ $pengajuans->sebab_kematian === 'bunuh diri' ? 'selected' : '' }}>Bunuh
                                            Diri</option>
                                        <option value="lainnya"
                                            {{ $pengajuans->sebab_kematian === 'lainnya' ? 'selected' : '' }}>Lainnya
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group" id="tempat_kematians" style="display: none">
                                    <label for="tempat_kematian">Tempat Kematian *</label>
                                    <input type="text" name="tempat_kematian" class="form-control"
                                        id="tempat_kematian" value="{{ $pengajuans->tempat_kematian }}"
                                        placeholder="Enter Tempat Kematian">
                                </div>
                                <div class="form-group" id="saksi_keterangan_kematians" style="display: none">
                                    <label for="saksi_keterangan_kematian">Saksi Keterangan Kematian *</label>
                                    <select name="saksi_keterangan_kematian" class="form-control"
                                        id="saksi_keterangan_kematian">
                                        <option value="">Pilih Saksi Keterangan Kematian</option>
                                        <option value="dokter"
                                            {{ $pengajuans->saksi_keterangan_kematian === 'dokter' ? 'selected' : '' }}>
                                            Dokter</option>
                                        <option value="tenaga kesehatan"
                                            {{ $pengajuans->saksi_keterangan_kematian === 'tenaga kesehatan' ? 'selected' : '' }}>
                                            Tenaga Kesehatan</option>
                                        <option value="kepolisian"
                                            {{ $pengajuans->saksi_keterangan_kematian === 'kepolisian' ? 'selected' : '' }}>
                                            Kepolisian</option>
                                        <option value="lainnya"
                                            {{ $pengajuans->saksi_keterangan_kematian === 'lainnya' ? 'selected' : '' }}>
                                            Lainnya</option>
                                    </select>
                                </div>

                                {{-- Surat Kematian, Kelahiran --}}

                                <div class="form-group" id="status_ayahs" style="display: none">
                                    <label for="status_ayah">Status Ayah *</label>
                                    <select name="status_ayah" class="form-control" id="status_ayah">
                                        <option value="">Pilih Status Ayah</option>
                                        <option value="masih hidup"
                                            {{ $pengajuans->status_ayah === 'masih hidup' ? 'selected' : '' }}>Masih
                                            Hidup</option>
                                        <option value="meninggal/luar desa"
                                            {{ $pengajuans->status_ayah === 'meninggal/luar desa' ? 'selected' : '' }}>
                                            Meninggal/Luar Desa</option>
                                    </select>
                                </div>
                                <div class="form-group" id="name_ayahs" style="display: none">
                                    <label for="name_ayah">Nama Ayah *</label>
                                    <input type="text" name="name_ayah" class="form-control" id="name_ayah"
                                        value="{{ $pengajuans->name_ayah }}" placeholder="Enter Name Ayah">
                                </div>
                                <div class="form-group" id="nik_ayahs" style="display: none">
                                    <label for="nik_ayah">NIK Ayah *</label>
                                    <input type="number" name="nik_ayah" class="form-control" id="nik_ayah"
                                        value="{{ $pengajuans->nik_ayah }}" placeholder="Enter NIK Ayah">
                                </div>
                                <div class="form-group" id="status_ibus" style="display: none">
                                    <label for="status_ibu">Status Ibu *</label>
                                    <select name="status_ibu" class="form-control" id="status_ibu">
                                        <option value="">Pilih Status Ibu</option>
                                        <option value="masih hidup"
                                            {{ $pengajuans->status_ibu === 'masih hidup' ? 'selected' : '' }}>Masih
                                            Hidup</option>
                                        <option value="meninggal/luar desa"
                                            {{ $pengajuans->status_ibu === 'masih hidup' ? 'selected' : '' }}>
                                            Meninggal/Luar Desa</option>
                                    </select>
                                </div>
                                <div class="form-group" id="name_ibus" style="display: none">
                                    <label for="name_ibu">Nama Ibu *</label>
                                    <input type="text" name="name_ibu" class="form-control" id="name_ibu"
                                        value="{{ $pengajuans->name_ibu }}" placeholder="Enter Nama Ibu">
                                </div>
                                <div class="form-group" id="nik_ibus" style="display: none">
                                    <label for="nik_ibu">NIK Ibu *</label>
                                    <input type="number" name="nik_ibu" class="form-control" id="nik_ibu"
                                        value="{{ $pengajuans->nik_ibu }}" placeholder="Enter NIK Ibu">
                                </div>
                                <div class="form-group" id="saksi_1s" style="display: none">
                                    <label for="saksi_1">Saksi I *</label>
                                    <input type="text" name="saksi_1" class="form-control" id="saksi_1"
                                        value="{{ $pengajuans->saksi_1 }}" placeholder="Enter Saksi I">
                                </div>
                                <div class="form-group" id="saksi_2s" style="display: none">
                                    <label for="saksi_2">Saksi II *</label>
                                    <input type="text" name="saksi_2" class="form-control" id="saksi_2"
                                        value="{{ $pengajuans->saksi_2 }}" placeholder="Enter Saksi II">
                                </div>

                                {{-- Surat Keterangan Usaha --}}

                                <div class="form-group" id="jenis_usahas" style="display: none">
                                    <label for="jenis_usaha">Jenis Usaha *</label>
                                    <input type="text" name="jenis_usaha" class="form-control" id="jenis_usaha"
                                        value="{{ $pengajuans->jenis_usaha }}" placeholder="Enter Jenis Usaha">
                                </div>

                                {{-- Surat Keterangan Pengantar, Usaha, Kelakuan Baik, Beda Nama --}}

                                <div class="form-group" id="keterangans" style="display: none">
                                    <label for="keterangan">Keperluan *</label>
                                    <input type="text" name="keterangan" class="form-control" id="keterangan"
                                        value="{{ $pengajuans->keterangan }}" placeholder="Enter Keperluan">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="number" required name="no_hp" disabled
                                        value="{{ $penduduk->no_hp }}" class="form-control" id="no_hp"
                                        placeholder="Enter No Hp">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('penduduk.pengajuan') }}" type="button"
                                    class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary float-right">Edit Pengajuan</button>
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
<script>
    function checkidjenissurat() {
        jenissurat = @json($pengajuans->id_jenis_surat);
        console.log(jenissurat);
        // Surat Keterangan Tidak Mampu, Ijin Orang Tua / Wali, Pernyataan Belum / Tidak Bekerja
        var statusOrangTuasDiv = document.getElementById("status_orang_tuas");
        var saksi1sDiv = document.getElementById("saksi_1s");
        var saksi2sDiv = document.getElementById("saksi_2s");
        // Surat Kelahiran
        var nameBayisDiv = document.getElementById("name_bayis");
        var jenisKelaminBayisDiv = document.getElementById("jenis_kelamin_bayis");
        var tempatDilahirkansDiv = document.getElementById("tempat_dilahirkans");
        var tanggalLahirBayisDiv = document.getElementById("tanggal_lahir_bayis");
        var waktuLahirBayisDiv = document.getElementById("waktu_lahir_bayis");
        var jenisKelahiransDiv = document.getElementById("jenis_kelahirans");
        var kelahiranKesDiv = document.getElementById("kelahiran_kes");
        var penolongKelahiransDiv = document.getElementById("penolong_kelahirans");
        var beratBayisDiv = document.getElementById("berat_bayis");
        var panjangBayisDiv = document.getElementById("panjang_bayis");
        // Surat Kematian
        var nameJenazahsDiv = document.getElementById("name_jenazahs");
        var tanggalKematiansDiv = document.getElementById("tanggal_kematians");
        var waktuKematiansDiv = document.getElementById("waktu_kematians");
        var sebabKematiansDiv = document.getElementById("sebab_kematians");
        var tempatKematiansDiv = document.getElementById("tempat_kematians");
        var saksiKetranganKematiansDiv = document.getElementById("saksi_keterangan_kematians");
        // Surat Kematian, Kelahiran
        var statusAyahsDiv = document.getElementById("status_ayahs");
        var statusIbusDiv = document.getElementById("status_ibus");
        var saksi1sDiv = document.getElementById("saksi_1s");
        var saksi2sDiv = document.getElementById("saksi_2s");
        // Surat Keterangan Usaha
        var jenisUsahasDiv = document.getElementById("jenis_usahas");
        // Surat Keterangan Pengantar, Usaha, Kelakuan Baik, Beda Nama
        var keterangansDiv = document.getElementById("keterangans");
        var nameOrangTuaDiv = document.getElementById("name_orang_tuas");
        var nikOrangTuasDiv = document.getElementById("nik_orang_tuas");
        var nameAyahDiv = document.getElementById("name_ayahs");
        var nikAyahDiv = document.getElementById("nik_ayahs");
        var nameIbuDiv = document.getElementById("name_ibus");
        var nikIbuDiv = document.getElementById("nik_ibus");

        if (jenissurat === "1" || jenissurat === "7" || jenissurat === "9") {
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
            statusOrangTuasDiv.style.display = "block";
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "block";
        } else if (jenissurat === "2") {
            nameBayisDiv.style.display = "block";
            jenisKelaminBayisDiv.style.display = "block";
            tempatDilahirkansDiv.style.display = "block";
            tanggalLahirBayisDiv.style.display = "block";
            waktuLahirBayisDiv.style.display = "block";
            jenisKelahiransDiv.style.display = "block";
            kelahiranKesDiv.style.display = "block";
            penolongKelahiransDiv.style.display = "block";
            beratBayisDiv.style.display = "block";
            panjangBayisDiv.style.display = "block";
            statusOrangTuasDiv.style.display = "none";
            statusAyahsDiv.style.display = "block";
            statusIbusDiv.style.display = "block";
            saksi1sDiv.style.display = "block";
            saksi2sDiv.style.display = "block";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "none";
        } else if (jenissurat === "3") {
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
            statusAyahsDiv.style.display = "block";
            statusIbusDiv.style.display = "block";
            saksi1sDiv.style.display = "block";
            saksi2sDiv.style.display = "block";
            nameJenazahsDiv.style.display = "block";
            tanggalKematiansDiv.style.display = "block";
            waktuKematiansDiv.style.display = "block";
            sebabKematiansDiv.style.display = "block";
            tempatKematiansDiv.style.display = "block";
            saksiKetranganKematiansDiv.style.display = "block";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "none";
        } else if (jenissurat === "4") {
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
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "block";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "block";
        } else if (jenissurat === "5" || jenissurat === "6" || jenissurat === "8") {
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
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "block";
        } else {
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
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "none";
        }
    }
    checkidjenissurat();
</script>
<script>
    function toggleJenisSurat() {
        var jenisSuratSelect = document.getElementById("id_jenis_surat");
        // Surat Keterangan Tidak Mampu, Ijin Orang Tua / Wali, Pernyataan Belum / Tidak Bekerja
        var statusOrangTuasDiv = document.getElementById("status_orang_tuas");
        var saksi1sDiv = document.getElementById("saksi_1s");
        var saksi2sDiv = document.getElementById("saksi_2s");
        // Surat Kelahiran
        var nameBayisDiv = document.getElementById("name_bayis");
        var jenisKelaminBayisDiv = document.getElementById("jenis_kelamin_bayis");
        var tempatDilahirkansDiv = document.getElementById("tempat_dilahirkans");
        var tanggalLahirBayisDiv = document.getElementById("tanggal_lahir_bayis");
        var waktuLahirBayisDiv = document.getElementById("waktu_lahir_bayis");
        var jenisKelahiransDiv = document.getElementById("jenis_kelahirans");
        var kelahiranKesDiv = document.getElementById("kelahiran_kes");
        var penolongKelahiransDiv = document.getElementById("penolong_kelahirans");
        var beratBayisDiv = document.getElementById("berat_bayis");
        var panjangBayisDiv = document.getElementById("panjang_bayis");
        // Surat Kematian
        var nameJenazahsDiv = document.getElementById("name_jenazahs");
        var tanggalKematiansDiv = document.getElementById("tanggal_kematians");
        var waktuKematiansDiv = document.getElementById("waktu_kematians");
        var sebabKematiansDiv = document.getElementById("sebab_kematians");
        var tempatKematiansDiv = document.getElementById("tempat_kematians");
        var saksiKetranganKematiansDiv = document.getElementById("saksi_keterangan_kematians");
        // Surat Kematian, Kelahiran
        var statusAyahsDiv = document.getElementById("status_ayahs");
        var statusIbusDiv = document.getElementById("status_ibus");
        var saksi1sDiv = document.getElementById("saksi_1s");
        var saksi2sDiv = document.getElementById("saksi_2s");
        // Surat Keterangan Usaha
        var jenisUsahasDiv = document.getElementById("jenis_usahas");
        // Surat Keterangan Pengantar, Usaha, Kelakuan Baik, Beda Nama
        var keterangansDiv = document.getElementById("keterangans");
        var nameOrangTuaDiv = document.getElementById("name_orang_tuas");
        var nikOrangTuasDiv = document.getElementById("nik_orang_tuas");
        var nameAyahDiv = document.getElementById("name_ayahs");
        var nikAyahDiv = document.getElementById("nik_ayahs");
        var nameIbuDiv = document.getElementById("name_ibus");
        var nikIbuDiv = document.getElementById("nik_ibus");

        if (jenisSuratSelect.value === "1" || jenisSuratSelect.value === "7" || jenisSuratSelect.value === "9") {
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
            statusOrangTuasDiv.style.display = "block";
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "block";
        } else if (jenisSuratSelect.value === "2") {
            nameBayisDiv.style.display = "block";
            jenisKelaminBayisDiv.style.display = "block";
            tempatDilahirkansDiv.style.display = "block";
            tanggalLahirBayisDiv.style.display = "block";
            waktuLahirBayisDiv.style.display = "block";
            jenisKelahiransDiv.style.display = "block";
            kelahiranKesDiv.style.display = "block";
            penolongKelahiransDiv.style.display = "block";
            beratBayisDiv.style.display = "block";
            panjangBayisDiv.style.display = "block";
            statusOrangTuasDiv.style.display = "none";
            statusAyahsDiv.style.display = "block";
            statusIbusDiv.style.display = "block";
            saksi1sDiv.style.display = "block";
            saksi2sDiv.style.display = "block";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "none";
        } else if (jenisSuratSelect.value === "3") {
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
            statusAyahsDiv.style.display = "block";
            statusIbusDiv.style.display = "block";
            saksi1sDiv.style.display = "block";
            saksi2sDiv.style.display = "block";
            nameJenazahsDiv.style.display = "block";
            tanggalKematiansDiv.style.display = "block";
            waktuKematiansDiv.style.display = "block";
            sebabKematiansDiv.style.display = "block";
            tempatKematiansDiv.style.display = "block";
            saksiKetranganKematiansDiv.style.display = "block";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "none";
        } else if (jenisSuratSelect.value === "4") {
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
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "block";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "block";
        } else if (jenisSuratSelect.value === "5" || jenisSuratSelect.value === "6" || jenisSuratSelect.value === "8") {
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
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "block";
        } else {
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
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
            nameJenazahsDiv.style.display = "none";
            tanggalKematiansDiv.style.display = "none";
            waktuKematiansDiv.style.display = "none";
            sebabKematiansDiv.style.display = "none";
            tempatKematiansDiv.style.display = "none";
            saksiKetranganKematiansDiv.style.display = "none";
            jenisUsahasDiv.style.display = "none";
            nameOrangTuaDiv.style.display = "none";
            nikOrangTuasDiv.style.display = "none";
            nameAyahDiv.style.display = "none";
            nikAyahDiv.style.display = "none";
            nameIbuDiv.style.display = "none";
            nikIbuDiv.style.display = "none";
            keterangansDiv.style.display = "none";
        }
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusOrangTuaSelect = document.getElementById("status_orang_tua");
        var namaOrangTuaDiv = document.getElementById("name_orang_tuas");
        var nikOrangTuaDiv = document.getElementById("nik_orang_tuas");

        statusOrangTuaSelect.addEventListener("change", function() {
            if (statusOrangTuaSelect.value === "masih hidup") {
                namaOrangTuaDiv.style.display = "block";
                nikOrangTuaDiv.style.display = "block";
            } else {
                namaOrangTuaDiv.style.display = "none";
                nikOrangTuaDiv.style.display = "none";
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusAyahSelect = document.getElementById("status_ayah");
        var namaAyahDiv = document.getElementById("name_ayahs");
        var nikAyahDiv = document.getElementById("nik_ayahs");

        statusAyahSelect.addEventListener("change", function() {
            if (statusAyahSelect.value === "masih hidup") {
                namaAyahDiv.style.display = "block";
                nikAyahDiv.style.display = "block";
            } else {
                namaAyahDiv.style.display = "none";
                nikAyahDiv.style.display = "none";
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var statusIbuSelect = document.getElementById("status_ibu");
        var namaIbuDiv = document.getElementById("name_ibus");
        var nikIbuDiv = document.getElementById("nik_ibus");

        statusIbuSelect.addEventListener("change", function() {
            if (statusIbuSelect.value === "masih hidup") {
                namaIbuDiv.style.display = "block";
                nikIbuDiv.style.display = "block";
            } else {
                namaIbuDiv.style.display = "none";
                nikIbuDiv.style.display = "none";
            }
        });
    });
</script>
