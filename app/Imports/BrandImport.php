<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BrandImport implements ToModel, WithCustomCsvSettings, WithUpserts, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Brand([
            'name'          => $row['marca_beneficio'],
            'url_logo'      => $row['url_logo'],
            'category_id'   => $row['id_categoria_beneficio'],
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
        return 'name';
    }
}
