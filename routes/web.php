<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("excel.index");
});

Route::get('/excel', [ExcelController::class, 'index'])->name('excel.index');
Route::post('/excel/import', [ExcelController::class, 'import'])->name('excel.import');
