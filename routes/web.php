<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KesatuanController;
use App\Http\Controllers\PnsController;
use App\Http\Controllers\TniController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\UsulanPnsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('tni', TniController::class);
    Route::resource('pns', PnsController::class);

    Route::get('usulan-tni', [UsulanController::class, 'tni'])->name('usulan-tni.index');
    Route::get('usulan-tni/{slug}/create', [UsulanController::class, 'create'])->name('usulan-tni.create');
    Route::get('usulan-tni/{slug}/revisi', [UsulanController::class, 'revisi'])->name('usulan-tni.revisi');
    Route::get('usulan-tni/{slug}/verifikasi', [UsulanController::class, 'verify'])->name('usulan-tni.verify');
    Route::post('usulan-tni/verifikasi', [UsulanController::class, 'verifyUsulan'])->name('usulan-tni.verify-usulan');
    Route::post('usulan-tni/store', [UsulanController::class, 'store'])->name('usulan-tni.store');
    Route::post('usulan-tni/{id}/update', [UsulanController::class, 'update'])->name('usulan-tni.update');
    Route::post('usulan-tni/upload', [UploadController::class, 'skTni'])->name('usulan-tni.upload');

    Route::get('usulan-pns', [UsulanPnsController::class, 'pns'])->name('usulan-pns.index');
    Route::get('usulan-pns/{slug}/create', [UsulanPnsController::class, 'create'])->name('usulan-pns.create');
    Route::get('usulan-pns/{slug}/revisi', [UsulanPnsController::class, 'revisi'])->name('usulan-pns.revisi');
    Route::get('usulan-pns/{slug}/verifikasi', [UsulanPnsController::class, 'verify'])->name('usulan-pns.verify');
    Route::post('usulan-pns/verifikasi', [UsulanPnsController::class, 'verifyUsulan'])->name('usulan-pns.verify-usulan');
    Route::post('usulan-pns/store', [UsulanPnsController::class, 'store'])->name('usulan-pns.store');
    Route::post('usulan-pns/{id}/update', [UsulanPnsController::class, 'update'])->name('usulan-pns.update');
    Route::post('usulan-pns/upload', [UploadController::class, 'skPns'])->name('usulan-pns.upload');

    Route::post('filter', [FilterController::class, 'index'])->name('filter');
});

Route::middleware('admin')->group(function () {
    Route::resource('kesatuan', KesatuanController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('users', UserController::class);
});

require __DIR__ . '/auth.php';
