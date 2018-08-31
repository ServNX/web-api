<?php

namespace App\Services\Github;

use App\Services\Github\Api\Issues;
use App\Services\Github\Api\Repositories;
use App\Services\Github\Contracts\IssuesInterface;
use App\Services\Github\Contracts\RepositoriesInterface;
use Illuminate\Support\ServiceProvider;

class GithubServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGithubService();
    }

    /**
     * Register the github service class.
     *
     * @return void
     */
    protected function registerGithubService()
    {
        $this->app->singleton('service.github', function () {
            return new GithubService();
        });

        $this->app->alias('service.github', GithubService::class);
    }

}
