<?php

use App\Http\Controllers\Api\v1\NotebookController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1/notebook')->group(function () {
//    Route::resource('notebook', NotebookController::class);
    Route::get('/', [NotebookController::class, 'index']);
    Route::post('/', [NotebookController::class, 'store']);
    Route::get('/{id}', [NotebookController::class, 'show']);
    Route::post('/{id}', [NotebookController::class, 'update']);
    Route::delete('/{id}', [NotebookController::class, 'destroy']);
});
