<?php


Route::name('license-server.')
->prefix('license-server')
->namespace('MicroweberPackages\Modules\LicenseServer\Http\Controllers\Api')
->group(function () {

    \Illuminate\Support\Facades\Route::any('validate-legacy', 'LegacyLicenseController@validateLegacy')
        ->name('validate-legacy');

});
