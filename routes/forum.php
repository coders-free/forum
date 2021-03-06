<?php

use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BeneficiosComponent;
use App\Http\Controllers\VoucherController;

Route::get('/', BeneficiosComponent::class);

Route::get('vouchers/{voucher}', [VoucherController::class, 'show'])->name('vouchers.show');

Route::post('vouchers/{voucher}/exchange', [VoucherController::class, 'exchange'])->name('vouchers.exchange');

Route::get('contacto', [ContactoController::class, 'index'])->name('contacto.index');
Route::post('contacto', [ContactoController::class, 'store'])->name('contacto.store');

Route::get('ftp', function () {

    if (Illuminate\Support\Facades\Storage::disk('ftp')->exists('GENERADOS_DD/FORUM_CUPON_' . Illuminate\Support\Carbon::now()->format('Ymd') . '.csv')) {
        
        Maatwebsite\Excel\Facades\Excel::import(new App\Imports\BrandImport, 'GENERADOS_DD/FORUM_CUPON_' . Illuminate\Support\Carbon::now()->format('Ymd') . '.csv', 'ftp');
        Maatwebsite\Excel\Facades\Excel::import(new App\Imports\VoucherImport, 'GENERADOS_DD/FORUM_CUPON_' . Illuminate\Support\Carbon::now()->format('Ymd') . '.csv', 'ftp');
        Maatwebsite\Excel\Facades\Excel::import(new App\Imports\CodeImport, 'GENERADOS_DD/FORUM_CUPON_' . Illuminate\Support\Carbon::now()->format('Ymd') . '.csv', 'ftp');
        
    }

    /* Maatwebsite\Excel\Facades\Excel::import(new App\Imports\BrandImport, 'GENERADOS_DD/FORUM_CUPON_20210218' . '.csv', 'ftp');
    Maatwebsite\Excel\Facades\Excel::import(new App\Imports\VoucherImport, 'GENERADOS_DD/FORUM_CUPON_20210218' . '.csv', 'ftp');
    Maatwebsite\Excel\Facades\Excel::import(new App\Imports\CodeImport, 'GENERADOS_DD/FORUM_CUPON_20210218' . '.csv', 'ftp'); */

    return "Datos cargados con éxito";
});