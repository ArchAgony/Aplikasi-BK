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
            Siswa::create([
                'nama_siswa' => $request->nama,
                'nis' => $request->nis,
                'tingkat' => $request->tingkat,
                'jurusan' => $request->jurusan
            ]);

            return redirect('/siswa');
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
    public function update(Request $request, string $id)
    {
        //
        try {
            $siswa = Siswa::findOrFail($id);
            $siswa->update([
                'nis' => $request->nis,
                'nama_siswa' => $request->nama,
                'tingkat' => $request->tingkat,
                'jurusan' => $request->jurusan,
            ]);

            return redirect()->back()->with('success', 'Data siswa berhasil diupdate');
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
            Siswa::where('id', $id)->delete();
            return redirect('siswa')->with('success', 'Data berhasil dihapus');
        } catch (\Exception $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }
}
