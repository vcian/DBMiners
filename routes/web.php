<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.landing-page');
});

/**
 * Auth Routes
 */
Auth::routes(['login' => false]);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::group(['middleware' => 'subscriptionCheck'], function () {
    Route::post('login', [LoginController::class, 'login']);

});

/**
 * Dashboard Routes
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/*
* These routes need view-backend permission
* (good if you want to allow more than one group in the backend,
* then limit the backend features by different roles or permissions)
*
* Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
* These routes can not be hit if the password is expired
*/
Route::group(['prefix' => '', 'as' => 'backend.', 'middleware' => []], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    includeRouteFiles(__DIR__.'/backend/');
});