<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

use MicroweberPackages\Modules\LicenseServer\Http\Controllers\Api\AuthController;
use MicroweberPackages\Modules\LicenseServer\Http\Controllers\Api\LegacyLicenseController;

Route::prefix('api/license-server')
    ->name('license-server.')
    ->middleware(['api'])
    ->group(function () {
        Route::resource('licenses', LegacyLicenseController::class)
            ->middleware(Config::get('license-server.admin_api_middleware', ['auth:sanctum']))
            ->names('licenses');
    });
