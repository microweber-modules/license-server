<?php

namespace MicroweberPackages\Modules\LicenseServer;

use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use MicroweberPackages\Modules\LicenseServer\Listeners\OrderWasPaidListener;
use MicroweberPackages\Order\Events\OrderWasPaid;

class LicenseServerEventsServiceProvider extends EventServiceProvider
{
    protected $listen = [
        OrderWasPaid::class => [
            OrderWasPaidListener::class
        ],
    ];

}

