<?php

namespace App\Imports;

use App\Models\Voucher;
use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;


class VoucherImport implements ToModel, WithCustomCsvSettings, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $brand = Brand::where('name', $row['marca_beneficio'])->first();

        if(Voucher::where('brand_id', $brand->id)->where('voucher_type', $row['tipo_cupon'])->first()){
            return null;
        }

        return new Voucher([
            'brand_id'              => $brand->id,
            'voucher_type'          => $row['tipo_cupon'],
            'registration_date'     => Carbon::createFromFormat( 'd-m-Y', $row['fecha_registro']),
            'expiration_date'       => Carbon::createFromFormat( 'd-m-Y', $row['fecha_vencimiento']),
            'title'                 => $row['titulo'],
            'description'           => $row['descripcion_cupon'],
            'description2'          => $row['descripcion_2'],
            'url'                   => $row['url_boton'],
            'text_button'           => $row['texto_boton'],
        ]);
        
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ";"
        ];
    }
}
