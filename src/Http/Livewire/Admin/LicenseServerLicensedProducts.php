<?php
namespace MicroweberPackages\Modules\LicenseServer\Http\Livewire\Admin;

use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;
use MicroweberPackages\Billing\Models\SubscriptionPlan;
use MicroweberPackages\Modules\LicenseServer\Models\LicensedProduct;
use MicroweberPackages\Product\Models\Product;

class LicenseServerLicensedProducts extends Component
{
    use WithPagination;

    public $licensable = '';
    public $license_prefix = '';

    public function updatedLicensable()
    {
        $this->license_prefix = '';
        $undotLicensable = explode('.', $this->licensable);
        if (!empty($undotLicensable)) {
            $licensableId = $undotLicensable[1];
            $licensableType = $undotLicensable[0];

            if ($licensableType == 'product') {
                $product = Product::find($licensableId);
                if ($product) {
                    $this->license_prefix = $this->generatePrefix($product->title);
                }
            }
            if ($licensableType == 'subscription_plans') {
                $product = SubscriptionPlan::find($licensableId);
                if ($product) {
                    $this->license_prefix = $this->generatePrefix($product->name);
                }
            }
        }
    }

    public function generatePrefix($string)
    {

        $string = str_replace('-', '', $string);
        $string = str_slug($string);

        return $string;
    }

    public function delete($id)
    {
        $licensedProduct = LicensedProduct::find($id);
        if ($licensedProduct) {
            $licensedProduct->delete();
        }
    }

    public function addLicensedProduct()
    {
        $this->validate([
            'licensable' => 'required',
        ]);

        $undotLicensable = explode('.', $this->licensable);
        if (empty($undotLicensable)) {
            return;
        }
        $licensableId = $undotLicensable[1];
        $licensableType = $undotLicensable[0];

        $findLicensedProduct = LicensedProduct::where('licensable_id', $licensableId)
            ->where('licensable_type', $licensableType)
            ->first();
        if ($findLicensedProduct) {
            return;
        }

        $licensedProduct = new LicensedProduct();
        $licensedProduct->licensable_id = $licensableId;
        $licensedProduct->licensable_type = $licensableType;
        $licensedProduct->licensable_prefix = $this->license_prefix;
        $licensedProduct->save();

        $this->dispatch('$refresh');

    }

    public function render()
    {
        $licensedProductQuery = LicensedProduct::query();

        $licensedProducts = $licensedProductQuery->paginate(10);

        return view('microweber-module-license-server::livewire.admin.licensed-products', [
            'licensedProducts' => $licensedProducts,
            'products'=> Product::active()->get(),
            'subscriptionPlans'=> SubscriptionPlan::get()
        ]);

    }
}
