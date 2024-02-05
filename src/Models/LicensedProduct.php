<?php

namespace MicroweberPackages\Modules\LicenseServer\Models;

use Illuminate\Database\Eloquent\Model;
use MicroweberPackages\Billing\Models\SubscriptionPlan;
use MicroweberPackages\Product\Models\Product;

class LicensedProduct extends Model
{
    protected $table = 'ls_licensed_products';

    public function licensableTypeName()
    {
        $licensableType = $this->licensable_type;
        if ($licensableType == 'products') {
            return 'Products';
        }
        if ($licensableType == 'subscription_plans') {
            return 'Subscription Plans';
        }

        return 'Unknown';
    }

    public function title() {

        $licensableType = $this->licensable_type;
        $licensableId = $this->licensable_id;

        if ($licensableType == 'product') {
            $product = Product::find($licensableId);
            if ($product) {
                return $product->title;
            }
        }

        if ($licensableType == 'subscription_plans') {
            $subscriptionPlan = SubscriptionPlan::find($licensableId);
            if ($subscriptionPlan) {
                return $subscriptionPlan->name;
            }
        }

        return 'Unknown';

    }

}
