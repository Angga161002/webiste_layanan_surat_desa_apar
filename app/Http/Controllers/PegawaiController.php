<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Penduduk;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.dashboard');
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
        $pegawais = Pegawai::all();
        // dd($pegawais->all());
        return view('pegawai.pengajuan.pengajuan', ['pegawais' => $pegawais]);
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
