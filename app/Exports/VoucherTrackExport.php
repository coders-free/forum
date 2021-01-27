<?php

namespace App\Exports;

use App\Models\VoucherTrack;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VoucherTrackExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return VoucherTrack::select('id_cliente', 'rut', 'accion', 'modulo', 'observacion', 'fecha_track')->get();
    }

    public function headings(): array
    {
        return [
            'ID_CLIENTE',
            'RUT',
            'ACCION',
            'MODULO',
            'OBSERVACION',
            'FECHA_TRACK',
        ];
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
}
