<?php
/** Add your custom Admin routes here, we will never update or overwrite this file **/

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;


Route::get('pdf', [PdfController::class, 'geraPdf'])->name('pdf.index');
Route::get('downloadpdf', [PdfController::class, 'downloadPdf'])->name('downloadpdf.index');
Route::get('ripd', [PdfController::class, 'index'])->name('ripd.index');
