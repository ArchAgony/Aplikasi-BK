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
        $laporan = LaporanKonseling::with('guru', 'siswa')->orderBy('id', 'desc')->get();
        return view('laporankons.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $siswa = Siswa::all();
        return view('laporankons.create', compact('siswa'));
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
            'tindak_lanjut' => $request->tindak_lanjut,
            'penyelesaian' => $request->penyelesaian,
            'penyebab' => $request->penyebab,
            'keterangan' => $request->keterangan,
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
    public function edit(string $id)
    {
        $laporan = LaporanKonseling::with('guru', 'siswa')->findOrFail($id);
        $siswa = Siswa::all();

        return view('laporankons.edit', compact('laporan', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laporan = LaporanKonseling::find($id);

        // $laporan->siswa_id = $request->nama;
        $laporan->masalah = $request->masalah;
        $laporan->tindak_lanjut = $request->tindak_lanjut;
        $laporan->penyelesaian = $request->penyelesaian;
        $laporan->penyebab = $request->penyebab;
        $laporan->keterangan = $request->keterangan;

        $laporan->save();

        return redirect('/laporan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LaporanKonseling::where('id', $id)->delete();
        return redirect('/laporan')->with('success', 'Data berhasil dihapus');
    }
}
