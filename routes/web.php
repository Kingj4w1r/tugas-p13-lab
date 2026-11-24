<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaboratoriumController;

Route::get('/', function () {
    return redirect('/laboratorium');
});

Route::prefix('laboratorium')->group(function () {
    Route::get('/', [LaboratoriumController::class, 'index']);
    Route::get('/detail/{kode}', [LaboratoriumController::class, 'detail']);
    Route::get('/status/{status?}', [LaboratoriumController::class, 'statusLab']);
});