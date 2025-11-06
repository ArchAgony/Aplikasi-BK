<?php

namespace App\Http\Controllers;

use App\Models\LaporanKonseling;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $laporan = LaporanKonseling::with('guru', 'siswa')->get();
        return view('laporankons.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $siswa = Siswa::all();
        return view('laporankons.form_laporank', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        LaporanKonseling::create([
            'siswa_id' => $request->nama,
            'masalah' => $request->masalah,
            'kesimpulan_masalah' => $request->kesimpulan,
            'penyelesaian' => $request->penyelesaian,
            'penyebab' => $request->penyebab,
            'evaluasi' => $request->evaluasi,
            'tanggal' => Carbon::now()
        ]);
        return redirect('/laporan')->with('success', 'data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanKonseling $laporanKonseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanKonseling $laporanKonseling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanKonseling $laporanKonseling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanKonseling $laporanKonseling)
    {
        //
    }
}
