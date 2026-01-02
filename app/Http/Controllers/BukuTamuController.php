<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Models\Siswa;

use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = BukuTamu::with('siswa', 'guru')->orderBy('id', 'desc')->get();
        // return view('bktamu.index', compact('data'));
        // return response()->json([
        //     'data' => $data
        // ]);
        $data = BukuTamu::with('siswa')->get();
        return view('bktamu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('bktamu.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $siswaId = $request->siswa_id;
            $jumlahKunjunganSebelumnya = BukuTamu::where('siswa_id', $siswaId)->count();
            $kunjunganKe = $jumlahKunjunganSebelumnya + 1;

            BukuTamu::create([
                'siswa_id' => $request->nama,
                'nama_tamu' => $request->ortu,
                'no_telp' => $request->no,
                'alamat' => $request->alamat,
                'tindak_lanjut' => $request->tindak,
                'kunjungan_ke' => $kunjunganKe,
                'tanggal' => now()->toDateString(),
            ]);

            return redirect('/tamu')->with('success', 'Data tamu berhasil disimpan');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BukuTamu $bukuTamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = BukuTamu::with('siswa')->findOrFail($id);
        $siswa = Siswa::all();
        return view('bktamu.edit', compact('data', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $data = BukuTamu::find($id);

            $data->siswa_id = $request->nama;
            $data->nama_tamu = $request->ortu;
            $data->no_telp = $request->no;
            $data->alamat = $request->alamat;
            $data->tindak_lanjut = $request->tindak;

            $data->save();
            return redirect('/tamu')->with('success', 'Data tamu berhasil diupdate');
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
            BukuTamu::where('id', $id)->delete();
            return redirect('/tamu')->with('success', 'Data tamu berhasil dihapus');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
