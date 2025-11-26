<?php

namespace App\Imports;

use App\Models\BukuTamu;
use Maatwebsite\Excel\Concerns\ToModel;

class BukuTamuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BukuTamu([
            'tanggal'     => $row[0],
            
        ]);
    }
}
