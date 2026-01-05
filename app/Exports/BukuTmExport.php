<?php

namespace App\Exports;

use App\Models\BukuTamu;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BukuTmExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Load data dengan eager loading
        return BukuTamu::with(['siswa' => function($query) {
            $query->select('id', 'nama_siswa', 'tingkat', 'jurusan');
        }])->get();
    }
    
    /**
    * Map data untuk Excel
    */
    public function map($bukuTamu): array
    {
        return [
            $bukuTamu->id,
            $bukuTamu->siswa ? $bukuTamu->siswa->nama_siswa : 'Tidak ada data',
            $bukuTamu->siswa ? $bukuTamu->siswa->tingkat : '-',
            $bukuTamu->siswa ? $bukuTamu->siswa->jurusan : '-',
            $bukuTamu->tanggal ? \Carbon\Carbon::parse($bukuTamu->tanggal)->format('Y-m-d') : '-',
            $bukuTamu->nama_tamu ?? '-',
            (string)$bukuTamu->no_telp ?? '-',
            $bukuTamu->alamat ?? '-',
            $bukuTamu->kunjungan_ke ?? '-',
            $bukuTamu->tindak_lanjut ?? '-',
        ];
    }

    /**
    * Header Excel
    */
    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Tingkat',
            'Jurusan',
            'Tanggal',
            'Nama Orang Tua',
            'No. Telepon',
            'Alamat',
            'Kunjungan Ke',
            'Tindak Lanjut',
        ];
    }
}