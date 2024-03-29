<?php
namespace MicroweberPackages\Modules\LicenseServer\Http\Controllers\Admin;

use Illuminate\Http\Request;
use MicroweberPackages\Modules\LicenseServer\Models\ExtendedProduct;
use MicroweberPackages\Modules\LicenseServer\Services\LicenseService;

class AdminController extends \MicroweberPackages\Admin\Http\Controllers\AdminController {

    public function index(Request $request)
    {

//        $product = ExtendedProduct::where('id', 30)->first();
//        $userId = user_id();
//        $license = LicenseService::addLicense($product, 'microweber.com', $userId);

//        // license key in uuid format
//        $licenseKey = "7b2df404-8775-44ba-850a-753927039a6f";
//
//        // check license status
//        $licenseStatus = LicenseService::checkLicenseStatus($licenseKey);

//        dd($licenseStatus);

        return view('microweber-module-license-server::admin.index');
    }

    public function licenses(Request $request)
    {
        return view('microweber-module-license-server::admin.licenses');
    }

    public function licensedProducts(Request $request)
    {
        return view('microweber-module-license-server::admin.licensed-products');
    }

    public function settings(Request $request)
    {
        return view('microweber-module-license-server::admin.settings');
    }
}
