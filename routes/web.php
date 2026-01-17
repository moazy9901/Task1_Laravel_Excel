<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("clients.index");
});

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients/import', [ClientController::class, 'import'])->name('clients.import');
