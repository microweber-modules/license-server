<?php
namespace MicroweberPackages\Modules\LicenseServer\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminController extends \MicroweberPackages\Admin\Http\Controllers\AdminController {

    public function index(Request $request)
    {
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
