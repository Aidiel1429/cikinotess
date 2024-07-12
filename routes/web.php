<?php

use App\Http\Controllers\HutangController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TransaksiController::class, 'index'])->name("dashboard");
Route::get('/tambah', [TransaksiController::class, 'create'])->name('tambah');
Route::post('/', [TransaksiController::class, 'store'])->name('create');
Route::get('/edit/{id}', [TransaksiController::class, 'edit'])->name('edit');
Route::put('/{id}', [TransaksiController::class, 'update'])->name('update');
Route::delete('/{id}', [TransaksiController::class, 'destroy'])->name('delete');

Route::get('/hutang', [HutangController::class, 'index'])->name('hutang.dashboard');