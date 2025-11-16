<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $jumlahsiswa = Siswa::count();
            $siswa = Siswa::all();

        // Ambil jumlah kasus berdasarkan kelas dari tabel laporan_konselings
        // Menggabungkan tingkat + jurusan sebagai label kelas
        $kasusPerkelas = DB::table('laporan_konselings')
            ->join('siswas', 'laporan_konselings.siswa_id', '=', 'siswas.id')
            ->select(DB::raw("CONCAT(siswas.tingkat, ' ', siswas.jurusan) as kelas"), DB::raw('COUNT(laporan_konselings.id) as total'))
            ->groupBy('siswas.tingkat', 'siswas.jurusan')
            ->orderByDesc('total')
            ->get();

        // Ambil jumlah kasus berdasarkan jenis masalah dari laporan_konselings
        $kasusPerMasalah = DB::table('laporan_konselings')
            ->select('masalah', DB::raw('COUNT(id) as total'))
            ->groupBy('masalah')
            ->orderByDesc('total')
            ->get();
        return view('dashboard.home', compact('jumlahsiswa','siswa','kasusPerkelas','kasusPerMasalah'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
