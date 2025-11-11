<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BukuTamu::with('siswa', 'guru')->get();
        return view('bktamu.index', compact('data'));
        // return response()->json([
        //     'data' => $data
        // ]);
        $data = BukuTamu::with('siswa')->get();
        return view('bktamu.index', compact('data'));
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('bktamu.create', compact('siswa'));
    }


    private function saveSignature($base64String, $type)
    {
        $image = str_replace('data:image/png;base64,', '', $base64String);
        $image = str_replace(' ', '+', $image);
        $imageData = base64_decode($image);
        
        $imageName = 'ttd_' . date('YmdHis') . '.png';
        $path = 'ttd/' . $imageName;
        Storage::disk('public')->put($path, $imageData);
        
        return $path;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $ttdTamuPath = $this->saveSignature($request->ttd_tamu, 'tamu');

            BukuTamu::create([
                'siswa_id' => $request->nama,
                'nama_tamu' => $request->ortu,
                'no_telp' => $request->no,
                'alamat' => $request->alamat,
                'tindak_lanjut' => $request->tindak,
                'ttd_path' => $ttdTamuPath,
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
    public function edit(BukuTamu $bukuTamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BukuTamu $bukuTamu)
    {
        //
        try {
            $field = $request->validate([
                'guru_id' => 'required',
                'siswa_id' => 'nullable',
                'nama_tamu' => 'required',
                'no_telp' => 'nullable',
                'alamat' => 'nullable',
                'keperluan' => 'required',
                'tindak_lanjut' => 'nullable',
                'ttd_path' => 'nullable',
            ]);

            $bukuTamu->update($field);

            return response()->json([
                'message' => 'Berhasil mengubah data',
                'data' => $bukuTamu
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
    public function destroy(BukuTamu $bukuTamu)
    {
        //
        try {
            $bukuTamu->delete();
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
