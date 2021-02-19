<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Livewire\AdminVoucher;
use App\Http\Livewire\AdminCategorie;

use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\AdminUsers;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('admin/vouchers', AdminVoucher::class)->name('admin.vouchers.index');
    Route::get('admin/vouchers/{voucher}/edit', [VoucherController::class, 'edit'])->name('admin.vouchers.edit');
    Route::put('admin/vouchers/{voucher}', [VoucherController::class, 'update'])->name('admin.vouchers.update');
    

    Route::get('admin/categories', AdminCategorie::class)->name('admin.category.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');


    Route::get('admin/users', AdminUsers::class)->name('admin.users.index');

    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

