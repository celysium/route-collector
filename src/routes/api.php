<?php

use Celysium\RouteCollector\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')->middleware('api')->group(function () {

    Route::get('/routes', [RouteController::class, 'index'])->name('routes.list');
});