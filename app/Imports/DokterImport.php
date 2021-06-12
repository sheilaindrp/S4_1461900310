<?php

namespace App\Imports;

use App\Models\Dokter;
use Maatwebsite\Excel\Concerns\ToModel;

class DokterImport implements ToModel
{
    public function model(array $row)
    {
        return new Dokter([
            'nama' => $row[0],
            'jabatan' => $row[1],
        ]);
    }
}
