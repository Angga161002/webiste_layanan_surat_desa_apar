<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function penduduk()
    {
        return view('pegawai.penduduk');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pengajuan()
    {
        return view('pegawai.pengajuan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function jenissurat()
    {
        return view('pegawai.jenissurat');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
