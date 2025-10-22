<?php

namespace App\Http\Controllers;

use App\Models\KunjunganRumah;
use Illuminate\Http\Request;

class KunjunganRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KunjunganRumah::all();
        return view('kunjungan.index');
        return response()->json([
            'data' => $data
        ]);
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
        try {
            $field = $request->validate([
                'guru_id' => 'required',
                'siswa_id' => 'nullable',
                'tujuan' => 'nullable',
                'hasil_wawancara' => 'nullable',
                'kesimpulan_tindak_lanjut' => 'nullable',
                'ttd_path' => 'nullable',
            ]);

            $data = KunjunganRumah::create([
                'guru_id' => $request->guru_id,
                'siswa_id' => $request->siswa_id,
                'tujuan' => $request->tujuan,
                'hasil_wawancara' => $request->hasil_wawancara,
                'kesimpulan_tindak_lanjut' => $request->kesimpulan_tindak_lanjut,
                'ttd_path' => $request->ttd_path,
                'tanggal' => now()->toDateString(),
            ]);

            return response()->json([
                'message' => 'berhasil ditambahkan',
                'data' => $data
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KunjunganRumah $kunjunganRumah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KunjunganRumah $kunjunganRumah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KunjunganRumah $kunjunganRumah)
    {
        //
        try {
            $field = $request->validate([
                'guru_id' => 'required',
                'siswa_id' => 'nullable',
                'tujuan' => 'nullable',
                'hasil_wawancara' => 'nullable',
                'kesimpulan_tindak_lanjut' => 'nullable',
                'ttd_path' => 'nullable',
            ]);

            $kunjunganRumah->update($field);

            return response()->json([
                'message' => 'berhasil diupdate',
                'data' => $kunjunganRumah
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KunjunganRumah $kunjunganRumah)
    {
        //
        try {
            $kunjunganRumah->delete();
            return response()->json([
                'message' => 'berhasil dihapus'
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
