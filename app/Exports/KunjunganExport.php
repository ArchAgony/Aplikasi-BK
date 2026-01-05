<?php

namespace App\Exports;

use App\Models\KunjunganRumah;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KunjunganExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KunjunganRumah::with('siswa')->get()->map (function ($item) {
            return [
                'id' => $item->id,
                'nama_siswa' => $item->siswa->nama_siswa,
                'tanggal' => $item->tanggal,
                 'peran' => $item->peran,
                  'hubungan_wali' => $item->hubungan_wali,
                   'nama' => $item->nama,
                    'pekerjaan' => $item->pekerjaan,
                     'alamat' => $item->alamat,
                      'alasan_tujuan' => $item->alasan_tujuan,
                       'hasil_wawancara' => $item->hasil_wawancara,
                        'tindak_lanjut' => $item->tindak_lanjut
            ];
        });
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nama Siswa',
            'Tanggal',
            'Peran',
            'Hubungan Wali',
            'Nama Orang Tua',
            'Pekerjaan',
            'Alamat',
            'Keperluan',
            'Hasil Wawancara',
            'Tindak Lanjut',
        ];
    }
}
