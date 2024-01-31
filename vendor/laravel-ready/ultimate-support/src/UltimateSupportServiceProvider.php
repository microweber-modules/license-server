<?php

namespace LaravelReady\UltimateSupport;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use LaravelReady\UltimateSupport\Facades\UltimateSupport;

final class UltimateSupportServiceProvider extends BaseServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/ultimate-support.php' => $this->app->configPath('ultimate-support.php'),
        ], 'ultimate-support-config');
    }

    public function register(): void
    {
        $this->app->singleton('ultimate-support', function () {
            return new UltimateSupport();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/ultimate-support.php', 'ultimate-support');
    }
}
