<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Livewire\AdminVoucher;

use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\AdminUsers;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('admin/vouchers', AdminVoucher::class)->name('admin.vouchers.index');
    Route::get('admin/vouchers/{voucher}/edit', [VoucherController::class, 'edit'])->name('admin.vouchers.edit');
    Route::put('admin/vouchers/{voucher}', [VoucherController::class, 'update'])->name('admin.vouchers.update');


    Route::get('admin/users', AdminUsers::class)->name('admin.users.index');

    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

