<?php

return [
    /**
     * This prefix will be used for all tables created by the license-server.
     *
     * Table name prefixes are used to prevent naming conflicts when using multiple stores
     * or local conflicts with other tables in the database.
     *
     * Example table name: ls_licenses
     *
     * Default: ls
     */
    'default_table_prefix' => 'ls',

    /**
     * If you allow the subdomain licensing, you can set unlimited subdomains.
     *
     * If you set this to false, you can only set one subdomain.
     *
     * Default: false
     */
    'allow_subdomains' => true,

    /**
     * Set license expiration days.
     *
     * In service, if you don't set this, it will use the default value from the config file.
     *
     * Default: 365
     */
    'license_expiration_days' => 365,

    /**
     * Allow lifetime licenses.
     *
     * If you set this to true, you can create a lifetime license.
     * If you set this to false, previous licenses won't be affected.
     *
     * Default: true
     */
    'allow_lifetime_licenses' => true,

    /**
     * Allow trial licenses.
     *
     * If you set this to true, you can create a trial license.
     *
     * Default: true
     */
    'allow_trial_licenses' => true,

    /**
     * Trial license expiration days.
     *
     * Default: 30
     */
    'trial_expiration_days' => 30,

    /**
     * Admin api middleware
     */
    'admin_api_middleware' => [
        'auth:sanctum',
        'throttle:api',
    ],
];
