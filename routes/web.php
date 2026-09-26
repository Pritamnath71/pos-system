<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseReturnController;
use App\Http\Controllers\PurchaseFileController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Purchases
|--------------------------------------------------------------------------
*/

Route::resource('purchases', PurchaseController::class);


/*
|--------------------------------------------------------------------------
| Purchase Returns
|--------------------------------------------------------------------------
*/

Route::resource(
    'purchase-returns',
    PurchaseReturnController::class
);


/*
|--------------------------------------------------------------------------
| Purchase Files
|--------------------------------------------------------------------------
*/

Route::resource(
    'purchase-files',
    PurchaseFileController::class
);

Route::resource(
    'purchase-returns',
    PurchaseReturnController::class
);

Route::get(
    '/purchase-files',
    [PurchaseFileController::class, 'index']
)->name('purchase-files.index');

Route::post(
    '/purchase-files',
    [PurchaseFileController::class, 'store']
)->name('purchase-files.store');

Route::get(
    '/purchase-files/{purchaseFile}/download',
    [PurchaseFileController::class, 'download']
)->name('purchase-files.download');

Route::delete(
    '/purchase-files/{purchaseFile}',
    [PurchaseFileController::class, 'destroy']
)->name('purchase-files.destroy');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/admin/profile', [AdminController::class, 'profile'])
    ->name('admin.profile');

Route::get('/admin/settings', [AdminController::class, 'settings'])
    ->name('admin.settings');