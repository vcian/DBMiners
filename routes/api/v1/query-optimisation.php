<?php

use App\Http\Controllers\Api\V1\Access\QueryOptimisationController;

Route::group(['as' => 'api.query-optimisation.'], function () {
    Route::POST('query-optimise', [QueryOptimisationController::class, 'getOptimisedQuery'])->name('query-optimise');
});