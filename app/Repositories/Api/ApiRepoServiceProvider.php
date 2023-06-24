<?php
namespace App\Repositories\Api;

use Illuminate\Support\ServiceProvider;

class ApiRepoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Api\Access\QueryOptimisationRepository'
        );
    }
}
