<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth:admin')->group(function () {
    Route::get('admin/import', [UsersImportController::class, 'import'])->name("admin.import.index");
    Route::post('admin/import', [UsersImportController::class, 'import'])->name("admin.import.index");
    Route::get('admin/export', [UsersExportController::class, 'export'])->name("admin.export.index");
    });

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/pdf', [PdfController::class, 'geraPdf'])->name('admin.pdf.index');
    Route::get('admin/downloadpdf', [PdfController::class, 'downloadPdf'])->name('admin.downloadpdf.index');
    Route::get('admin/ripd', [PdfController::class, 'index'])->name('admin.ripd.index');
    });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
