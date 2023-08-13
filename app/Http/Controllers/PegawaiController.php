<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Penduduk;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('pegawai.login');
    }

    public function authenticate(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $result = Pegawai::where('username', '=', $validateData['username'])->first();
        if ($result) {
            if (Hash::check($request->password, $result->password)) {
                session(['username' => $request->username]);
                return redirect('/pegawai')->with('success', 'Login Behasil!');
            } else {
                return back()->with('error', 'Login Gagal!');
            }
        } else {
            return back()->with('error', 'Login Gagal!');
        }
    }

    public function logout(request $request)
    {
        session()->forget('username');
        return redirect('/login')->with('success', 'Log Out Behasil!');
    }

    public function index()
    {
        $data = [];
        $pegawai = Pegawai::where('id', '=', Session::get('id'))->first();
        // dd($pegawai->all());
        return view('pegawai.dashboard', compact('pegawai'));
    }

    //Pegawai
    /**
     * Show the form for creating a new resource.
     */
    public function pegawai()
    {
        $pegawais = Pegawai::all();
        // dd($pegawais->all());
        return view('pegawai.pegawai.pegawai', ['pegawais' => $pegawais]);
    }

    public function addpegawai()
    {
        return view('pegawai.pegawai.addpegawai');
    }

    public function tambahpegawai(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'username' => 'required|min:3|max:50',
            'email' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        $pegawais = new Pegawai();
        $pegawais->username = $validateData['username'];
        $pegawais->email = $validateData['email'];
        $pegawais->no_hp = $validateData['no_hp'];
        $pegawais->password = Hash::make($validateData['password']);
        $pegawais->save();
        return redirect()->route('pegawai.pegawai')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function editpegawai($pegawai_id)
    {
        $pegawais = Pegawai::findOrFail($pegawai_id);
        // dd($pegawai_id);
        return view('pegawai.pegawai.editpegawai', ['pegawais' => $pegawais]);
    }

    public function ubahpegawai(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $pegawais = Pegawai::where('id', '=', $id)->first();
        if (!empty($request->username)) {
            $pegawais->username = $request->username;
        }
        $pegawais->email = $request->email;
        $pegawais->no_hp = $request->no_hp;
        if (!empty($request->password)) {
            $pegawais->password = Hash::make($request->password);
        }
        $pegawais->save();
        return redirect()->route('pegawai.pegawai')->with('success', 'Data Berhasil Diedit!');
    }

    public function hapuspegawai($id)
    {
        try {
            $pegawais = Pegawai::findOrFail($id);
            $pegawais->delete();
            return redirect()->route('pegawai.pegawai')->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal Menghapus Data!');
        }
    }

    //Penduduk
    /**
     * Show the form for creating a new resource.
     */
    public function penduduk()
    {
        $penduduks = Penduduk::all();
        // dd($penduduks->all());
        return view('pegawai.penduduk.penduduk', ['penduduks' => $penduduks]);
    }

    public function addpenduduk()
    {
        return view('pegawai.penduduk.addpenduduk');
    }

    public function tambahpenduduk(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'nik' => 'required|digits:16',
            'password' => 'required',
        ]);

        $penduduks = new Penduduk();
        $penduduks->nik = $validateData['nik'];
        $penduduks->password = Hash::make($validateData['password']);
        $penduduks->save();
        return redirect()->route('pegawai.penduduk')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function hapuspenduduk($nik)
    {
        // dd($nik);
        try {
            $penduduks = Penduduk::where('nik', $nik)->firstOrFail();
            // dd($penduduks->all());
            $penduduks->delete();
            return redirect()->route('pegawai.penduduk')->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal Menghapus Data: ' . $e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function detailpenduduk($nik)
    {
        $penduduks = Penduduk::where('nik', $nik)->firstOrFail();

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Detail Data Penduduk',
            'data' => $penduduks
        ]);
    }

    //Pengajuan
    /**
     * Show the form for creating a new resource.
     */
    public function pengajuan()
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->get();
        // dd($pengajuans->all());

        return view('pegawai.pengajuan.pengajuan', ['pengajuans' => $pengajuans]);
    }

    public function editpengajuan($pengajuan_id)
    {
        $pengajuans = Pengajuan::findOrFail($pengajuan_id);
        // dd($pengajuan_id);
        return view('pegawai.pengajuan.editpengajuan', ['pengajuans' => $pengajuans]);
    }

    public function ubahpengajuan(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $pengajuans = Pengajuan::where('id', '=', $id)->first();
        if (!empty($request->nik_penduduk)) {
            $pengajuans->nik_penduduk = $request->nik_penduduk;
        }
        $pengajuans->status = $request->status;
        $pengajuans->no_dokumen_perjalanan = $request->no_dokumen_perjalanan;
        if (!empty($request->id_jenis_surat)) {
            $pengajuans->id_jenis_surat = $request->id_jenis_surat;
        }
        $pengajuans->save();
        return redirect()->route('pegawai.pengajuan')->with('success', 'Data Status Berhasil Diedit!');
    }

    public function hapuspengajuan($id)
    {
        // dd($id);
        try {
            $pengajuans = Pengajuan::where('id', $id)->firstOrFail();
            // dd($pengajuans->all());
            $pengajuans->delete();
            return redirect()->route('pegawai.pengajuan')->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal Menghapus Data: ' . $e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function detailpengajuan($id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $id)
            ->firstOrFail();
        // dd($pengajuans);
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Detail Data Pengajuan',
            'data' => $pengajuans
        ]);
    }


    //Jenis Surat
    /**
     * Show the form for creating a new resource.
     */
    public function jenissurat()
    {
        $jenissurats = JenisSurat::all();
        // dd($pegawais->all());
        return view('pegawai.jenissurat.jenissurat', ['jenissurats' => $jenissurats]);
    }

    public function addjenissurat()
    {
        return view('pegawai.jenissurat.addjenissurat');
    }

    public function tambahjenissurat(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'name_surat' => 'required',
        ]);
        $jenissurats = new Jenissurat();
        $jenissurats->name_surat = $validateData['name_surat'];
        $jenissurats->save();
        return redirect()->route('pegawai.jenissurat')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function editjenissurat($jenissurat_id)
    {
        $jenissurats = JenisSurat::findOrFail($jenissurat_id);
        // dd($jenissurat_id);
        return view('pegawai.jenissurat.editjenissurat', ['jenissurats' => $jenissurats]);
    }

    public function ubahjenissurat(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $jenissurats = JenisSurat::where('id', '=', $id)->first();
        $jenissurats->name_surat = $request->name_surat;
        $jenissurats->save();
        return redirect()->route('pegawai.jenissurat')->with('success', 'Data Berhasil Diedit!');
    }

    public function hapusjenissurat($id)
    {
        try {
            $jenissurats = JenisSurat::findOrFail($id);
            $jenissurats->delete();
            return redirect()->route('pegawai.jenissurat')->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal Menghapus Data!');
        }
    }

    public function suratketerangantidakmampu($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratketerangantidakmampu', ['pengajuans' => $pengajuans]);
    }

    public function suratkelahiran($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratkelahiran', ['pengajuans' => $pengajuans]);
    }

    public function suratkematian($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratkematian', ['pengajuans' => $pengajuans]);
    }

    public function suratketeranganusaha($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratketeranganusaha', ['pengajuans' => $pengajuans]);
    }

    public function suratketeranganpengantar($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratketeranganpengantar', ['pengajuans' => $pengajuans]);
    }

    public function suratketerangankelakuanbaik($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratketerangankelakuanbaik', ['pengajuans' => $pengajuans]);
    }

    public function suratketeranganijinorangtuawali($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratketeranganijinorangtuawali', ['pengajuans' => $pengajuans]);
    }

    public function suratketeranganbedanama($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratketeranganbedanama', ['pengajuans' => $pengajuans]);
    }

    public function suratpernyataanbelumtidakbekerja($pengajuan_id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'pengajuans.status', 'pengajuans.no_dokumen_perjalanan', 'pengajuans.status_orang_tua', 'pengajuans.name_orang_tua', 'pengajuans.nik_orang_tua', 'pengajuans.name_bayi', 'pengajuans.jenis_kelamin_bayi', 'pengajuans.tempat_dilahirkan', 'pengajuans.tanggal_lahir_bayi', 'pengajuans.waktu_lahir', 'pengajuans.jenis_kelahiran', 'pengajuans.kelahiran_ke', 'pengajuans.penolong_kelahiran', 'pengajuans.berat_bayi', 'pengajuans.panjang_bayi', 'pengajuans.status_ayah', 'pengajuans.name_ayah', 'pengajuans.nik_ayah', 'pengajuans.status_ibu', 'pengajuans.name_ibu', 'pengajuans.nik_ibu', 'pengajuans.name_jenazah', 'pengajuans.tanggal_kematian', 'pengajuans.waktu_kematian', 'pengajuans.sebab_kematian', 'pengajuans.tempat_kematian', 'pengajuans.saksi_keterangan_kematian', 'pengajuans.jenis_usaha', 'pengajuans.keterangan', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.id', $pengajuan_id)
            ->firstOrFail();
        // dd($pengajuans);
        return view('surat.suratpernyataanbelumtidakbekerja', ['pengajuans' => $pengajuans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function calendar()
    {
        return view('pegawai.calendar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function gallery()
    {
        return view('pegawai.gallery');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }
}
