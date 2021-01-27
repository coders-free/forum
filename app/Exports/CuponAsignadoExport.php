<?php

namespace App\Exports;

use App\Models\CuponAsignado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CuponAsignadoExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CuponAsignado::select('marca_beneficio', 'codigo_cupon', 'id_cliente', 'rut', 'fecha_asignacion')->get();
    }

    public function headings(): array
    {
        return [
            'MARCA_BENEFICIO',
            'CODIGO_CUPON',
            'ID_CLIENTE',
            'RUT',
            'FECHA_ASIGNACION',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
}
