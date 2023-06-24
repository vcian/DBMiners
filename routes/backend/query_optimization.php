<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\QueryOptimization\QueryOptimizationController;

Route::controller(QueryOptimizationController::class)
    ->as('query_optimization.')
    ->group(function () {
        Route::get('query-optimization', 'index')->name('index');
    });