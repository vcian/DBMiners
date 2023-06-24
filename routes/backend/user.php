<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\User\UserController;

Route::controller(UserController::class)
    ->as('user.')
    ->group(function () {
        Route::get('profile', 'profile')->name('profile');
    });