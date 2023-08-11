<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function register()
    {
        return view('penduduk.register');
    }

    public function authenticateregister(Request $request)
    {
        try {
            // dd($request->all());
            $validateData = $request->validate([
                'nik' => 'required|digits:16',
                'name' => 'required',
                'password' => 'required',
            ]);

            $penduduks = new Penduduk();
            $penduduks->nik = $validateData['nik'];
            $penduduks->name = $validateData['name'];
            $penduduks->password = Hash::make($validateData['password']);
            $penduduks->save();
            return redirect()->route('penduduk.login')->with('success', 'Register Berhasil, Silahkan Login!');
        } catch (\Exception $e) {
            return back()->with('error', 'Registrasi Gagal!');
        }
    }

    public function login()
    {
        return view('penduduk.login');
    }

    public function authenticate(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required|digits:16',
            'password' => 'required'
        ]);

        $result = Penduduk::where('nik', '=', $validateData['nik'])->first();
        if ($result) {
            if (Hash::check($request->password, $result->password)) {
                session(['nik' => $request->nik]);
                return redirect('/penduduk')->with('success', 'Login Behasil!');
            } else {
                return back()->with('error', 'Login Gagal!');
            }
        } else {
            return back()->with('error', 'Login Gagal!');
        }
    }

    public function logout(request $request)
    {
        session()->forget('nik');
        return redirect('/')->with('success', 'Log Out Behasil!');
    }

    public function index()
    {
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        // dd($penduduk->all());
        return view('penduduk.dashboard', compact('penduduk'));
    }

    public function profile()
    {
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        // dd($penduduk->all());
        return view('penduduk.profile', compact('penduduk'));
    }

    public function profileedit(Request $request)
    {
        // dd($request->all());
        $nik = $request->nik;
        $penduduks = Penduduk::where('nik', '=', $nik)->first();
        if (!empty($validatedData['nik'])) {
            $penduduks->nik = $request->nik;
        }
        $penduduks->email = $request->email;
        $penduduks->name = $request->name;
        $penduduks->pekerjaan = $request->pekerjaan;
        $penduduks->tanggal_lahir = $request->tanggal_lahir;
        $penduduks->tempat_lahir = $request->tempat_lahir;
        $penduduks->jenis_kelamin = $request->jenis_kelamin;
        $penduduks->alamat = $request->alamat;
        $penduduks->agama = $request->agama;
        $penduduks->no_hp = $request->no_hp;
        if (!empty($validatedData['password'])) {
            $penduduks->password = Hash::make($request->password);
        }
        $penduduks->save();
        return redirect()->route('penduduk')->with('success', 'Data Profile Berhasil Diedit!');
    }

    public function tambahpengajuan()
    {
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        // dd($penduduk->all());
        return view('penduduk.pengajuan.createpengajuan', compact('penduduk'));
    }

    //Pengajuan
    /**
     * Show the form for creating a new resource.
     */
    public function pengajuan()
    {
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
            ->where('pengajuans.nik_penduduk', $penduduk->nik)
            ->get();
        // dd($pengajuans->all());
        return view('penduduk.pengajuan.pengajuan', ['pengajuans' => $pengajuans], ['penduduk' => $penduduk]);
    }

    public function addpengajuan(Request $request)
    {
        try {
            // dd($request->all());
            $validateData = $request->validate([
                'nik_penduduk' => 'required|digits:16',
            ]);

            $pengajuans = new Pengajuan();
            $pengajuans->nik_penduduk = $validateData['nik_penduduk'];
            $pengajuans->id_jenis_surat = $request->id_jenis_surat;
            // $pengajuans->warga_negara = $request->warga_negara;
            $pengajuans->name_bayi = $request->name_bayi;
            $pengajuans->jenis_kelamin_bayi = $request->jenis_kelamin_bayi;
            $pengajuans->tempat_dilahirkan = $request->tempat_dilahirkan;
            $pengajuans->tanggal_lahir_bayi = $request->tanggal_lahir_bayi;
            $pengajuans->waktu_lahir = $request->waktu_lahir_bayi;
            $pengajuans->jenis_kelahiran = $request->jenis_kelahiran;
            $pengajuans->kelahiran_ke = $request->kelahiran_ke;
            $pengajuans->penolong_kelahiran = $request->penolong_kelahiran;
            $pengajuans->berat_bayi = $request->berat_bayi;
            $pengajuans->panjang_bayi = $request->panjang_bayi;
            $pengajuans->status_ayah = $request->status_ayah;
            $pengajuans->name_ayah = $request->nama_ayah;
            $pengajuans->nik_ayah = $request->nik_ayah;
            $pengajuans->status_ibu = $request->status_ibu;
            $pengajuans->name_ibu = $request->name_ibu;
            $pengajuans->nik_ibu = $request->nik_ibu;
            $pengajuans->saksi_1 = $request->saksi_1;
            $pengajuans->saksi_2 = $request->saksi_2;
            $pengajuans->name_jenazah = $request->name_jenazah;
            $pengajuans->tanggal_kematian = $request->tanggal_kematian;
            $pengajuans->waktu_kematian = $request->waktu_kematian;
            $pengajuans->sebab_kematian = $request->sebab_kematian;
            $pengajuans->tempat_kematian = $request->tempat_kematian;
            $pengajuans->saksi_keterangan_kematian = $request->saksi_keterangan_kematian;
            $pengajuans->jenis_usaha = $request->jenis_usaha;
            $pengajuans->keterangan = $request->keterangan;
            $pengajuans->status_orang_tua = $request->status_orang_tua;
            $pengajuans->name_orang_tua = $request->name_orang_tua;
            $pengajuans->nik_orang_tua = $request->nik_orang_tua;
            $pengajuans->save();
            return redirect()->route('penduduk.pengajuan')->with('success', 'Pengajuan Surat Berhasil, Silahkan Cek Status Surat di Table Pengajuan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Pengajuan Surat Gagal!: ' . $e->getMessage());
        }
    }

    public function editpengajuan($pengajuan_id)
    {
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        $pengajuans = Pengajuan::findOrFail($pengajuan_id);
        // dd($pengajuans);
        return view('penduduk.pengajuan.editpengajuan', ['pengajuans' => $pengajuans], ['penduduk' => $penduduk]);
    }

    public function ubahpengajuan(Request $request)
    {
        try {
            // dd($request->all());
            $id = $request->id;
            $pengajuans = Pengajuan::where('id', '=', $id)->first();
            $pengajuans->nik_penduduk = $request->nik_penduduk;
            $pengajuans->id_jenis_surat = $request->id_jenis_surat;
            // $pengajuans->warga_negara = $request->warga_negara;
            $pengajuans->name_bayi = $request->name_bayi;
            $pengajuans->jenis_kelamin_bayi = $request->jenis_kelamin_bayi;
            $pengajuans->tempat_dilahirkan = $request->tempat_dilahirkan;
            $pengajuans->tanggal_lahir_bayi = $request->tanggal_lahir_bayi;
            $pengajuans->waktu_lahir = $request->waktu_lahir_bayi;
            $pengajuans->jenis_kelahiran = $request->jenis_kelahiran;
            $pengajuans->kelahiran_ke = $request->kelahiran_ke;
            $pengajuans->penolong_kelahiran = $request->penolong_kelahiran;
            $pengajuans->berat_bayi = $request->berat_bayi;
            $pengajuans->panjang_bayi = $request->panjang_bayi;
            $pengajuans->status_ayah = $request->status_ayah;
            $pengajuans->name_ayah = $request->nama_ayah;
            $pengajuans->nik_ayah = $request->nik_ayah;
            $pengajuans->status_ibu = $request->status_ibu;
            $pengajuans->name_ibu = $request->name_ibu;
            $pengajuans->nik_ibu = $request->nik_ibu;
            $pengajuans->saksi_1 = $request->saksi_1;
            $pengajuans->saksi_2 = $request->saksi_2;
            $pengajuans->name_jenazah = $request->name_jenazah;
            $pengajuans->tanggal_kematian = $request->tanggal_kematian;
            $pengajuans->waktu_kematian = $request->waktu_kematian;
            $pengajuans->sebab_kematian = $request->sebab_kematian;
            $pengajuans->tempat_kematian = $request->tempat_kematian;
            $pengajuans->saksi_keterangan_kematian = $request->saksi_keterangan_kematian;
            $pengajuans->jenis_usaha = $request->jenis_usaha;
            $pengajuans->keterangan = $request->keterangan;
            $pengajuans->status_orang_tua = $request->status_orang_tua;
            $pengajuans->name_orang_tua = $request->name_orang_tua;
            $pengajuans->nik_orang_tua = $request->nik_orang_tua;
            $pengajuans->save();
            return redirect()->route('penduduk.pengajuan')->with('success', 'Data Pengajuan Berhasil Diedit!');
        } catch (\Exception $e) {
            return back()->with('error', 'Data Pengajuan Gagal Diedit!');
            // dd($e->getMessage());
        }
    }

    public function hapuspengajuan($id)
    {
        // dd($id);
        try {
            $pengajuans = Pengajuan::where('id', $id)->firstOrFail();
            // dd($pengajuans->all());
            $pengajuans->delete();
            return redirect()->route('penduduk.pengajuan')->with('success', 'Data Berhasil Dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal Menghapus Data: ' . $e->getMessage());
            // dd($e->getMessage());
        }
    }

    public function detailpengajuan($id)
    {
        $pengajuans = Pengajuan::join('penduduks', 'pengajuans.nik_penduduk', '=', 'penduduks.nik')
            ->join('jenis_surats', 'pengajuans.id_jenis_surat', '=', 'jenis_surats.id')
            ->select('pengajuans.*', 'penduduks.name', 'penduduks.email', 'penduduks.pekerjaan', 'penduduks.tanggal_lahir', 'penduduks.tempat_lahir', 'penduduks.jenis_kelamin', 'penduduks.alamat', 'penduduks.agama', 'penduduks.no_hp', 'jenis_surats.name_surat')
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
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        $jenissurats = JenisSurat::all();
        // dd($pegawais->all());
        return view('penduduk.jenissurat.jenissurat', ['jenissurats' => $jenissurats], ['penduduk' => $penduduk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function calendar()
    {
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        // dd($penduduk->all());
        return view('penduduk.calendar', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function gallery()
    {
        $data = [];
        $penduduk = Penduduk::where('nik', '=', Session::get('nik'))->first();
        // dd($penduduk->all());
        return view('penduduk.gallery', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
