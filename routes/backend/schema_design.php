<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SchemaDesign\SchemaDesignController;

Route::controller(SchemaDesignController::class)
    ->as('schema_design.')
    ->group(function () {
        Route::get('schema-design', 'index')->name('index');
        Route::post('schema-chat', 'chat')->name('chat');
});