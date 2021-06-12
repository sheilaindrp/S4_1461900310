<?php

namespace App\Imports;

use App\Models\Pasien;
use Maatwebsite\Excel\Concerns\ToModel;

class PasienImport implements ToModel
{
    public function model(array $row)
    {
        return new Pasien([
            'nama' => $row[0],
            'alamat' => $row[1],
        ]);
    }
}
