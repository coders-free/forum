<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithCustomCsvSettings, WithUpserts, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'id'        => $row['id_categoriabeneficio'],
            'name'      => $row['categoria'],
            'active'    => $row['activo'],
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
        return 'id';
    }
}
