<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DBConnection\DBConnectionController;

Route::controller(DBConnectionController::class)
    ->as('db_connect.')
    ->group(function () {
        Route::get('db-connect', 'index')->name('index');
        Route::post('connect-db', 'connect')->name('connect-db');
        Route::post('upload-db', 'upload')->name('upload-db');
    });