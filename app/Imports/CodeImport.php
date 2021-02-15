<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Code;
use App\Models\Voucher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CodeImport implements ToModel, WithCustomCsvSettings, WithUpserts, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $brand = Brand::where('name', $row['marca_beneficio'])->first();
        $voucher = Voucher::where('brand_id', $brand->id)->where('voucher_type', $row['tipo_cupon'])->first();


        if($row['codigo_cupon'] == 'SIN_CUPON'){
            return null;
        }

        return new Code([
            'value' => $row['codigo_cupon'],
            'voucher_id' => $voucher->id
        ]);
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";",
            'input_encoding' => 'UTF-16'
        ];
    }

    public function uniqueBy()
    {
        return 'value';
    }
}
