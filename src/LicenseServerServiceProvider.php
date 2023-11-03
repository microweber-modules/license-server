<?php

namespace MicroweberPackages\Modules\LicenseServer;

use Illuminate\Routing\Router;

use Illuminate\Support\ServiceProvider;
use MicroweberPackages\Modules\LicenseServer\Support\DomainSupport;
use MicroweberPackages\Modules\LicenseServer\Services\LicenseService;
use MicroweberPackages\Modules\LicenseServer\Http\Middleware\DomainGuardMiddleware;
use MicroweberPackages\Modules\LicenseServer\Http\Middleware\LicenseGuardMiddleware;

use Laravel\Sanctum\Http\Middleware\CheckAbilities;

final class LicenseServerServiceProvider extends ServiceProvider
{
    public function boot(Router $router): void
    {
        $this->bootPublishes();

        $this->loadRoutes();

        $this->loadMiddlewares($router);

        DomainSupport::checkTldCache();
    }

    public function register(): void
    {
        $this->registerConfigs();
        
        $this->app->singleton('license-server', function () {
            return new LicenseService();
        });
    }

    /**
     * Boot publishes
     */
    private function bootPublishes(): void
    {
        // configs
        $this->publishes([
            __DIR__ . '/config/license-server.php' => $this->app->configPath('license-server.php'),
        ], 'license-server-configs');

        // migrations
        $migrationsPath = __DIR__ . '/database/migrations/';

        $this->publishes([
            $migrationsPath => database_path('migrations/laravel-ready/theme-store')
        ], 'license-server-migrations');

        $this->loadMigrationsFrom($migrationsPath);
    }

    /**
     * Register package configs
     */
    private function registerConfigs(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/license-server.php', 'license-server');
    }

    /**
     * Load api routes
     */
    private function loadRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api-public.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api-private.php');
    }

    /**
     * Load custom middlewares
     *
     * @param Router $router
     */
    private function loadMiddlewares(Router $router): void
    {
        $router->aliasMiddleware('ls-domain-guard', DomainGuardMiddleware::class);
        $router->aliasMiddleware('ls-license-guard', LicenseGuardMiddleware::class);
        $router->aliasMiddleware('sanctum-abilities', CheckAbilities::class);
    }
}
