<?php

namespace Phumsoft\Repository\Providers;

use Prettus\Repository\Providers\RepositoryServiceProvider as BaseRepositoryServiceProvider;

/**
 * Class RepositoryServiceProvider
 */
class RepositoryServiceProvider extends BaseRepositoryServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishResources();
    }

    /**
     * Publish resources.
     *
     * @return void
     */
    private function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../Configs/repository.php' => config_path('repository.php'),
        ]);
        $this->mergeConfigFrom(__DIR__ . '/../Configs/repository.php', 'repository');
    }
}
