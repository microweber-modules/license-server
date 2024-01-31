<?php

return [
    'ip' => [
        /**
         * Get client public IP address if it is localhost
         *
         * Default: true
         */
        'get_local_public_ip' => true,

        /**
         * Use cache for local client IP address
         *
         * Cache key: ultimate-support:ip:local_public_ip
         * Cache time: 1 day
         *
         * Default: true
         */
        'use_cache_for_local_public_ip' => true,

        /**
         * Enable/Disable get IP address failure logging
         *
         * Default: true
         */
        'log_get_ip_errors' => true,
    ],
];
