<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\QueryLogs\QueryLogsController;

Route::controller(QueryLogsController::class)
    ->as('query_logs.')
    ->group(function () {
        Route::get('query-logs', 'index')->name('index');
        Route::get('chat', 'openChat')->name('chat');
        Route::post('chat/response', 'callOpenAIChatAPI')->name('response');
        Route::post('validate/schema', 'validateSchema')->name('validate.schema');
    });