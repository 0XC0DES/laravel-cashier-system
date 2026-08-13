<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [
    DashboardController::class,
    'index'
])
->middleware(['auth'])
->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', function () {
        return 'Halaman Admin';
    })->name('admin.dashboard');

});

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {

    Route::get('/kasir', function () {
        return 'Halaman Kasir';
    })->name('kasir.dashboard');

});

Route::middleware(['auth', 'role:admin,kasir'])->group(function () {

    Route::get('/transactions', [
        TransactionController::class,
        'index'
    ])->name('transactions.index');

    Route::get('/transactions/create', [
        TransactionController::class,
        'create'
    ])->name('transactions.create');

    Route::post('/transactions', [
        TransactionController::class,
        'store'
    ])->name('transactions.store');

    Route::get('/reports/sales', [
        ReportController::class,
        'sales'
    ])->name('reports.sales');

    Route::get('/reports/sales/export', [
        ReportController::class,
        'exportSales'
    ])->name('reports.sales.export');

    Route::get('/transactions/{transaction}', [
        TransactionController::class,
        'show'
    ])->name('transactions.show');

    Route::get('/transactions/{transaction}/receipt', [
        TransactionController::class,
        'receipt'
    ])->name('transactions.receipt');

});

require __DIR__.'/auth.php';