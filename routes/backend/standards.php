<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Standards\StandardsController;

Route::controller(StandardsController::class)
    ->as('standards.')
    ->middleware('auth')
    ->middleware('dynamicDBChange')
    ->group(function () {
        Route::get('standards', 'index')->name('index');
    });