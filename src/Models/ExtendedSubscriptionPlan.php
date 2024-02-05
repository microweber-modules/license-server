<?php

namespace MicroweberPackages\Modules\LicenseServer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MicroweberPackages\Billing\Models\SubscriptionPlan;
use MicroweberPackages\Modules\LicenseServer\Traits\Licensable;

class ExtendedSubscriptionPlan extends SubscriptionPlan
{
    use Licensable;
    use HasFactory;
}
