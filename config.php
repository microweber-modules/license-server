<?php
$config = array();
$config['name'] = "License Server";
$config['author'] = "Microweber";

$config['categories'] = "admin";
$config['version'] = 0.1;
$config['ui_admin'] = true;
$config['ui'] = false;
$config['position'] = 99;

$config['settings'] = [];
$config['settings']['routes'] = [
    'admin'=>'admin.license_server.index'
];

$config['settings']['autoload_namespace'] = [
    [
        'path' => __DIR__ . '/src/',
        'namespace' => 'MicroweberPackages\\Modules\\LicenseServer\\'
    ],
];
$config['settings']['service_provider'] = [
    \MicroweberPackages\Modules\LicenseServer\LicenseServerServiceProvider::class,
    \MicroweberPackages\Modules\LicenseServer\LicenseServerEventsServiceProvider::class
];
