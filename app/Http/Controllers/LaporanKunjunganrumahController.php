<?php

namespace App\Http\Controllers;

use App\Models\KunjunganRumah;
use App\Models\LaporanKunjunganrumah;
use Illuminate\Http\Request;

class LaporanKunjunganrumahController extends Controller
{
    public function index($id)
    {
        $data = LaporanKunjunganRumah::with(
            // 'guru',
             'siswa', 'bukutamu')->get();
        $kunjungan = KunjunganRumah::with('siswa', 'bukutamu')
        ->where('id', $id)
        ->first();
        return view('kunjungan.laporan_kunjungan', compact('data', 'kunjungan'));
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
    public function show(LaporanKunjunganrumah $LaporanKunjunganrumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanKunjunganrumah $LaporanKunjunganrumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanKunjunganrumah $LaporanKunjunganrumah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanKunjunganrumah $LaporanKunjunganrumah)
    {
        //
    }
}
