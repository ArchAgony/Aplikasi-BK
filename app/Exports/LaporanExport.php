<?php

namespace App\Exports;

use App\Models\LaporanKonseling;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Load data dengan eager loading
        return LaporanKonseling::with(['siswa' => function($query) {
            $query->select('id', 'nama_siswa');
        }])->get();
    }

    public function map($laporan): array
    {
        return [
            $laporan->id,
            $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('Y-m-d') : '-',
            $laporan->siswa ? $laporan->siswa->nama_siswa : 'Tidak ada data',
            $laporan->masalah ?? '-',
            $laporan->penyebab ?? '-',
            $laporan->tindak_lanjut ?? '-',
            $laporan->penyelesaian ?? '-',
            $laporan->keterangan ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tanggal',
            'Nama Siswa',
            'Masalah',
            'Penyebab',
            'Tindak Lanjut',
            'Penyelesaian',
            'Keterangan',
        ];
    }
}
