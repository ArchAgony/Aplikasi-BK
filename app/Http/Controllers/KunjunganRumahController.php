<?php

namespace App\Http\Controllers;

use App\Models\KunjunganRumah;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KunjunganRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KunjunganRumah::with(
            // 'guru',
             'siswa', 'bukutamu')->orderBy('id', 'desc')->get();
        return view('kunjungan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('kunjungan.form_kunj', compact('siswa'));
    }
    public function laporan()
    {
        return view('kunjungan.form_lpor_kunj');
    }
    public function loslaporan()
    {
        $data = KunjunganRumah::with(
            // 'guru',
             'siswa', 'bukutamu')->orderBy('id', 'desc')->get();
        return view('kunjungan.laporan_kunjungan', compact('data'));
    }
    public function layanan()
    {
        return view('kunjungan.form_lay_kunj');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
        try {

            KunjunganRumah::create([
                'siswa_id' => $request->nama,
                'nama_guru' => $request->nama_guru,
                'jabatan' => $request->jabatan,
                // 'kesimpulan_tindak_lanjut' => $request->kesimpulan_tindak_lanjut,
                'tanggal' => now()->toDateString(),
                'tanggal_laksana' => $request->tanggal_laksana,
            ]);

            return redirect('/kunjungan')->with('success', 'Data kunjungan berhasil disimpan');
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
    public function edit(string $id)
    {
        $data = KunjunganRumah::with('siswa')->findOrFail($id);
        $siswa = Siswa::all();
        return view('kunjungan.edit_kunjungan', compact('siswa', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $data = KunjunganRumah::find($id);

            $data->siswa_id = $request->nama;
            $data->nama_guru = $request->nama_guru;
            $data->jabatan = $request->jabatan;
            // $data->kesimpulan_tindak_lanjut = $request->kesimpulan_tindak_lanjut;
            $data->tanggal_laksana = $request->tanggal_laksana;

            $data->save();

            return redirect('/kunjungan')->with('success', 'Data kunjungan berhasil diupdate');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            KunjunganRumah::where('id', $id)->delete();
            return redirect('/kunjungan')->with('success', 'Data kunjungan berhasil dihapus');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
