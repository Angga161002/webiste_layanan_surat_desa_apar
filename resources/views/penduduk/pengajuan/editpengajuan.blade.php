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
                                    <label for="nik_penduduk">NIK</label>
                                    <input type="text" name="nik_penduduk" value="{{ $penduduk->nik }}"
                                        class="form-control" id="nik_penduduk" placeholder="Enter NIK Anda" required
                                        pattern="[0-9]{16}">
                                </div>
                                <div class="form-group">
                                    <label for="id_jenis_surat">Pilih Jenis Surat</label>
                                    <select required name="id_jenis_surat" class="form-control" id="id_jenis_surat">
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
                                    <input type="text" name="name" required value="{{ $penduduk->name }}"
                                        class="form-control" id="name" placeholder="Enter Name Anda">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" required
                                        value="{{ $penduduk->tempat_lahir }}" class="form-control" id="tempat_lahir"
                                        placeholder="Enter Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" required name="tanggal_lahir"
                                        value="{{ $penduduk->tanggal_lahir }}" class="form-control" id="tanggal_lahir"
                                        placeholder="Enter Tanggal lahir Anda">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" required name="alamat" value="{{ $penduduk->alamat }}"
                                        class="form-control" id="alamat" placeholder="Enter Alamat Anda">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" required name="pekerjaan" value="{{ $penduduk->pekerjaan }}"
                                        class="form-control" id="pekerjaan" placeholder="Enter Pekerjaan">
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
                                    <select required name="agama" class="form-control" id="agama">
                                        <option value="">Pilih Agama Anda</option>
                                        <option value="islam" {{ $penduduk->agama === 'islam' ? 'selected' : '' }}>
                                            Islam</option>
                                        <option value="kristen" {{ $penduduk->agama === 'kristen' ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="hindu" {{ $penduduk->agama === 'hindu' ? 'selected' : '' }}>
                                            Hindu</option>
                                        <option value="buddha" {{ $penduduk->agama === 'buddha' ? 'selected' : '' }}>
                                            Buddha</option>
                                        <option value="konghucu"
                                            {{ $penduduk->agama === 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group" id="name_bayis" style="display: none">
                                    <label for="name_bayi">Nama Bayi (Anak)</label>
                                    <input type="name_bayi" required name="name_bayi" class="form-control"
                                        id="name_bayi" value="{{ $pengajuans->name_bayi }}"
                                        placeholder="Enter Nama Bayi">
                                </div>
                                <div class="form-group" id="jenis_kelamin_bayis" style="display: none">
                                    <label for="jenis_kelamin_bayi">Jenis Kelamin Bayi</label>
                                    <select required name="jenis_kelamin_bayi" class="form-control"
                                        id="jenis_kelamin_bayi">
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
                                    <label for="tampat_dilahirkan">Tempat Dilahirkan</label>
                                    <select required name="tempat_dilahirkan" class="form-control"
                                        id="tempat_dilahirkan">
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
                                {{-- <div class="form-group">
                                    <label for="tempat_kelahiran">Tempat Kelahiran</label>
                                    <input type="tempat_kelahiran" required name="tempat_kelahiran"
                                        class="form-control" id="tempat_kelahiran"
                                        placeholder="Enter Tempat Kelahiran">
                                </div> --}}
                                <div class="form-group" id="tanggal_lahir_bayis" style="display: none">
                                    <label for="tanggal_lahir_bayi">Tanggal Lahir Bayi</label>
                                    <input type="date" required name="tanggal_lahir_bayi" class="form-control"
                                        id="tanggal_lahir_bayi" value="{{ $pengajuans->tanggal_lahir_bayi }}"
                                        placeholder="Enter Tanggal Lahir Bayi">
                                </div>
                                <div class="form-group" id="waktu_lahir_bayis" style="display: none">
                                    <label for="waktu_lahir_bayi">Waktu Lahir Bayi</label>
                                    <input type="time" required name="waktu_lahir_bayi" class="form-control"
                                        id="waktu_lahir_bayi" value="{{ $pengajuans->waktu_lahir }}"
                                        placeholder="Enter Waktu Lahir Bayi">
                                </div>
                                <div class="form-group" id="jenis_kelahirans" style="display: none">
                                    <label for="jenis_kelahiran">Jenis Kelahiran</label>
                                    <select required name="jenis_kelahiran" class="form-control"
                                        id="jenis_kelahiran">
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
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group" id="kelahiran_kes" style="display: none">
                                    <label for="kelahiran_ke">Kelahiran Ke</label>
                                    <input type="text" required name="kelahiran_ke" class="form-control"
                                        id="kelahiran_ke" value="{{ $pengajuans->kelahiran_ke }}"
                                        placeholder="Enter Kelahiran Ke">
                                </div>
                                <div class="form-group" id="penolong_kelahirans" style="display: none">
                                    <label for="penolong_kelahiran">Penolong Kelahiran</label>
                                    <select required name="penolong_kelahiran" class="form-control"
                                        id="penolong_kelahiran">
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
                                    <label for="berat_bayi">Berat Bayi</label>
                                    <input type="text" required name="berat_bayi" class="form-control"
                                        id="berat_bayi" value="{{ $pengajuans->berat_bayi }}"
                                        placeholder="Enter Berat Bayi">
                                </div>
                                <div class="form-group" id="panjang_bayis" style="display: none">
                                    <label for="panjang_bayi">Panjang Bayi</label>
                                    <input type="text" required name="panjang_bayi" class="form-control"
                                        id="panjang_bayi" value="{{ $pengajuans->panjang_bayi }}"
                                        placeholder="Enter Panjang Bayi">
                                </div>
                                <div class="form-group" id="status_ayahs" style="display: none">
                                    <label for="status_ayah">Status Ayah</label>
                                    <select required name="status_ayah" class="form-control" id="status_ayah">
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
                                    <label for="status_ibu">Status Ibu</label>
                                    <select required name="status_ibu" class="form-control" id="status_ibu">
                                        <option value="">Pilih Status Ibu</option>
                                        <option value="masih hidup"
                                            {{ $pengajuans->status_ibu === 'masih hidup' ? 'selected' : '' }}>Masih
                                            Hidup</option>
                                        <option value="meninggal/luar desa"
                                            {{ $pengajuans->status_ibu === 'meninggal/luar desa' ? 'selected' : '' }}>
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
                                    <label for="saksi_1">Saksi I</label>
                                    <input type="text" required name="saksi_1" class="form-control"
                                        id="saksi_1" value="{{ $pengajuans->saksi_1 }}"
                                        placeholder="Enter Saksi I">
                                </div>
                                <div class="form-group" id="saksi_2s" style="display: none">
                                    <label for="saksi_2">Saksi II</label>
                                    <input type="text" required name="saksi_2" class="form-control"
                                        id="saksi_2" value="{{ $pengajuans->saksi_2 }}"
                                        placeholder="Enter Saksi II">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="number" required name="no_hp" value="{{ $penduduk->no_hp }}"
                                        class="form-control" id="no_hp" placeholder="Enter No Hp">
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
        var statusAyahsDiv = document.getElementById("status_ayahs");
        var statusIbusDiv = document.getElementById("status_ibus");
        var saksi1sDiv = document.getElementById("saksi_1s");
        var saksi2sDiv = document.getElementById("saksi_2s");

        if (jenissurat === 2) {
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
            statusAyahsDiv.style.display = "block";
            statusIbusDiv.style.display = "block";
            saksi1sDiv.style.display = "block";
            saksi2sDiv.style.display = "block";
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
            statusAyahsDiv.style.display = "none";
            statusIbusDiv.style.display = "none";
            saksi1sDiv.style.display = "none";
            saksi2sDiv.style.display = "none";
        }
    }
    checkidjenissurat();
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var jenisSuratSelect = document.getElementById("id_jenis_surat");
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
        var statusAyahsDiv = document.getElementById("status_ayahs");
        var statusIbusDiv = document.getElementById("status_ibus");
        var saksi1sDiv = document.getElementById("saksi_1s");
        var saksi2sDiv = document.getElementById("saksi_2s");

        jenisSuratSelect.addEventListener("change", function() {
            if (jenisSuratSelect.value === "2") {
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
                statusAyahsDiv.style.display = "block";
                statusIbusDiv.style.display = "block";
                saksi1sDiv.style.display = "block";
                saksi2sDiv.style.display = "block";
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
                statusAyahsDiv.style.display = "none";
                statusIbusDiv.style.display = "none";
                saksi1sDiv.style.display = "none";
                saksi2sDiv.style.display = "none";
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
