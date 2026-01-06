<?php

namespace App\Http\Controllers;

use App\Models\KunjunganRumah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KunjunganExport;

class KunjunganRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KunjunganRumah::with(
            // 'guru',
            'siswa',
            'bukutamu'
        )->orderBy('id', 'desc')->get();
        return view('kunjungan.index', compact('data'));
    }
    public function exportExcel()
    {
        
         return Excel::download(new KunjunganExport, 'kunjungan_rumah.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('kunjungan.create', compact('siswa'));
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
        try {
            foreach ($request->nama as $index => $nama) {
                KunjunganRumah::create([
                    'siswa_id'      => $request->siswa_id,
                    'tanggal'       => now()->toDateString(),
                    'peran'         => $request->peran[$index],
                    'hubungan_wali' => $request->hubungan_wali[$index] ?? null,
                    'nama'          => $nama,
                    'pekerjaan'     => $request->pekerjaan[$index],
                    'alamat'        => $request->alamat[$index],
                    'alasan_tujuan' => $request->alasan_tujuan,
                    'hasil_wawancara' => $request->hasil_wawancara,
                    'tindak_lanjut' => $request->tindak_lanjut,
                ]);
            }

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
        return view('kunjungan.edit', compact('siswa', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $kunjungan = KunjunganRumah::findOrFail($id);

            // Pastikan hubungan_wali null jika bukan wali
            $hubunganWali = $request->peran === 'wali'
                ? $request->hubungan_wali
                : null;

            $kunjungan->update([
                'siswa_id'        => $request->siswa_id,
                'tanggal'         => $request->tanggal,
                'peran'           => $request->peran,
                'hubungan_wali'   => $hubunganWali,
                'nama'            => $request->nama,
                'pekerjaan'       => $request->pekerjaan,
                'alamat'          => $request->alamat,
                'alasan_tujuan'   => $request->alasan_tujuan,
                'hasil_wawancara' => $request->hasil_wawancara,
                'tindak_lanjut'   => $request->tindak_lanjut,
            ]);
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
