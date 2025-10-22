<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
        return response()->json([
            'siswa' => $siswa
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
                'nama_siswa' => 'required',
                'nis' => 'required',
                'tingkat' => 'required',
                'jurusan' => 'required',
            ]);

            $data = Siswa::create($field);
            return response()->json([
                'message' => 'data berhasil dibuat!',
                'data' => $data,
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
        try {
            $field = $request->validate([
                'nama_siswa' => 'required',
                'nis' => 'required',
                'tingkat' => 'required',
                'jurusan' => 'required',
            ]);

            $siswa->update($field);
            return response()->json([
                'message' => 'data berhasil diubah',
                'data' => $siswa
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
    public function destroy(Siswa $siswa)
    {
        //
        try {
            $siswa->delete();
            return redirect('siswa')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
