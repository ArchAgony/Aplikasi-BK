<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BukuTamu::all();
        return view('dashboard.bktamu.tamu');
        return response()->json([
            'data' => $data
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.bktamu.form_tamu');
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
                'nama_tamu' => 'required',
                'no_telp' => 'nullable',
                'alamat' => 'nullable',
                'keperluan' => 'required',
                'tindak_lanjut' => 'nullable',
                'ttd_path' => 'nullable',
            ]);

            $data = BukuTamu::create([
                'guru_id' => $request->guru_id,
                'siswa_id' => $request->siswa_id,
                'nama_tamu' => $request->nama_tamu,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'keperluan' => $request->keperluan,
                'tindak_lanjut' => $request->tindak_lanjut,
                'ttd_path' => $request->ttd_path,
                'tanggal' => now()->toDateString(),
            ]);

            return response()->json([
                'message' => 'berhasil ditambah',
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
