<?php

namespace MicroweberPackages\Modules\LicenseServer\Listeners;

use Illuminate\Support\Str;
use MicroweberPackages\Modules\LicenseServer\Models\ExtendedSubscriptionPlan;
use MicroweberPackages\Modules\LicenseServer\Models\LicensedProduct;
use MicroweberPackages\Modules\LicenseServer\Services\LicenseService;

class OrderWasPaidListener
{
    public function handle($event)
    {
        $findLicensedProduct = LicensedProduct::where('licensable_type', $event->order->rel_type)
            ->where('licensable_id', $event->order->rel_id)->first();

        if ($findLicensedProduct) {
            if ($findLicensedProduct->licensable_type == 'subscription_plans') {

                $userId = $event->order->created_by;
                $subscriptionPlan = ExtendedSubscriptionPlan::where('id', $event->order->rel_id)->first();

                $licenseKey = null;
                if (!empty($findLicensedProduct->licensable_prefix)) {
                    $licenseKey = $findLicensedProduct->licensable_prefix
                        .'-'. Str::random(6).'-'.Str::random(6).'-'.Str::random(6);
                }

                LicenseService::addLicense(
                    $subscriptionPlan,
                    null,
                    $userId,
                    null,
                    false,
                    false,
                    $licenseKey
                );

            }
        }

    }
}
