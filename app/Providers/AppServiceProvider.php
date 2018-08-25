<?php

namespace App\Providers;

use App\Contracts\ServiceRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Repositories\ServiceRepository;
use App\Repositories\UserRepository;
use App\Services\GithubService;
use Github\Client as GithubClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

        /**
         * Services
         */
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
            return new GithubService(new GithubClient());
        });

        $this->app->alias('service.github', GithubService::class);
    }

}
