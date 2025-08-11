<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/transaction', [TransactionController::class, 'index']);

Route::get('/transaction', [TransactionController::class, 'index'])->name('DaftarTransaksi');
Route::get('/transaction/create', [TransactionController::class, 'create'])->name('BuatTransaksi');
Route::post('/transaction/store', [TransactionController::class, 'store'])->name('SimpanTransaksi');
Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit'])->name('EditTransaksi');
Route::put('/transaction/update/{id}', [TransactionController::class, 'update'])->name('UpdateTransaksi');
Route::delete('/transaction/delete/{id}', [TransactionController::class, 'destroy'])->name('HapusTransaksi');
