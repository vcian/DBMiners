<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware([
    //
])->group(function () {
    includeRouteFiles(__DIR__ . '/api/versions');
});

//Default exception response if no route found under api urls
Route::fallback(function () {
    return response()->json(['error' => trans('api.something_went_wrong')], 404);
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
