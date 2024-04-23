<?php

namespace MicroweberPackages\Modules\LicenseServer\Listeners;

use Illuminate\Support\Str;
use MicroweberPackages\Modules\LicenseServer\Models\ExtendedSubscriptionPlan;
use MicroweberPackages\Modules\LicenseServer\Models\LicensedProduct;
use MicroweberPackages\Modules\LicenseServer\Notifications\UserLicenseActivatedNotification;
use MicroweberPackages\Modules\LicenseServer\Services\LicenseService;
use MicroweberPackages\Notification\Models\NotificationMailLog;
use MicroweberPackages\User\Models\User;

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

                $isLifetime = false;
                if ($subscriptionPlan->billing_interval == 'lifetime') {
                    $isLifetime = true;
                }
                $expirationDays = null;
                if ($subscriptionPlan->billing_interval == 'annually') {
                    $expirationDays = 365;
                }
                if ($subscriptionPlan->billing_interval == 'monthly') {
                    $expirationDays = 30;
                }
                if ($subscriptionPlan->billing_interval == 'weekly') {
                    $expirationDays = 7;
                }

                LicenseService::addLicense(
                    $subscriptionPlan,
                    null,
                    $userId,
                    $expirationDays,
                    $isLifetime,
                    false,
                    $licenseKey
                );

                $user = User::where('id', $userId)->first();

                $notification = new UserLicenseActivatedNotification([
                    'licenseKey' => $licenseKey,
                ]);

                Notification::sendNow($user, $notification);

                $mailLog = new NotificationMailLog();
                $mailLog->type = 'UserLicenseActivatedNotification';
                $mailLog->notifiable_type = 'user';
                $mailLog->notifiable_id = $userId;
                $mailLog->html = $notification->toMail($user)->render();
                $mailLog->save();

            }
        }

    }
}
