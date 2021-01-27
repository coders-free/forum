<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithCustomCsvSettings, WithUpserts, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'id_cliente' => $row['id_cliente'],
            'rut' => $row['rut'],
            'email' => $row['correo'],
            'name' => $row['nombre'],
            'points' => $row['puntos'],
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }

    public function uniqueBy()
    {
        return 'rut';
    }
}
