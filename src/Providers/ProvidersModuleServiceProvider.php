<?php

namespace Cashela\Modules\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider for the Providers Module.
 *
 * This provider is responsible for bootstrapping any application services
 * related to the Providers module, such as loading migrations.
 */
class ProvidersModuleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services for the Providers module.
     *
     * @return void
     */
    public function register(): void
    {
        // You may bind any Providers module services or repositories here.
    }

    /**
     * Bootstrap any application services for the Providers module.
     *
     * This method loads only the migrations that belong to the Providers module.
     *
     * @return void
     */
    public function boot(): void
    {
        // Load only the migrations for the Providers module
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/providers');
    }
}
