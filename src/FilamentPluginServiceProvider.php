<?php

namespace MicroweberPackages\Modules\LicenseServer;



use Filament\PluginServiceProvider;
use MicroweberPackages\Modules\LicenseServer\Filament\Resources\LicenseResource;
 use Spatie\LaravelPackageTools\Package;

class FilamentPluginServiceProvider extends PluginServiceProvider
{
    public static string $name = 'licenses';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews();

    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

    }

    public function packageBooted(): void
    {
        parent::packageBooted();


    }

    protected function getResources(): array
    {

        return [
            LicenseResource::class,
        ];
    }

    protected function getStyles(): array
    {
        return [

        ];
    }

    protected function getBeforeCoreScripts(): array
    {
        return [

        ];
    }
}
