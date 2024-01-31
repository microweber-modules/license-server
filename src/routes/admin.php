<?php

Route::name('admin.license-server.')
    ->prefix(ADMIN_PREFIX . '/license-server')
    ->middleware(['admin'])
    ->namespace('MicroweberPackages\Modules\LicenseServer\Http\Controllers\Admin')
    ->group(function () {

        Route::get('/', 'AdminController@index')->name('index');
        Route::get('/licenses', 'AdminController@licenses')->name('licenses');
        Route::get('/licensed-products', 'AdminController@licensedProducts')->name('licensed-products');
        Route::get('/settings', 'AdminController@settings')->name('settings');

    });
