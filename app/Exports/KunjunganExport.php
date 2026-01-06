<?php

namespace App\Exports;

use App\Models\KunjunganRumah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KunjunganExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KunjunganRumah::with(['siswa' => function($query) {
            $query->select('id', 'nama_siswa');
        }])->get();
    }

    public function map($kunjungan): array
    {
        return [
            $kunjungan->id,
            $kunjungan->siswa ? $kunjungan->siswa->nama_siswa : 'Tidak ada data',
            $kunjungan->tanggal ? \Carbon\Carbon::parse($kunjungan->tanggal)->format('Y-m-d') : '-',
            $kunjungan->peran ?? '-',
            $kunjungan->hubungan_wali ?? '-',
            $kunjungan->nama ?? '-',
            $kunjungan->pekerjaan ?? '-',
             $kunjungan->alamat ?? '-',
            $kunjungan->alasan_tujuan ?? '-',
            $kunjungan->hasil_wawancara ?? '-',
            $kunjungan->tindak_lanjut ?? '-',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Tanggal',
            'Peran',
            'Hubungan Wali',
            'Nama',
            'Pekerjaan',
            'Alamat',
            'Alasan Tujuan',
            'Hasil Wawancara',
            'Tindak Lanjut',
        ];
    }
}
