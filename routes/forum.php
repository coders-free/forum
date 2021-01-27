<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\BeneficiosComponent;
use App\Http\Controllers\VoucherController;

Route::get('/', BeneficiosComponent::class);

Route::get('vouchers/{voucher}', [VoucherController::class, 'show'])->name('vouchers.show');

Route::post('vouchers/{voucher}/exchange', [VoucherController::class, 'exchange'])->name('vouchers.exchange');