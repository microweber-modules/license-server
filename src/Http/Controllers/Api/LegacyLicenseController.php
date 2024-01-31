<?php

namespace MicroweberPackages\Modules\LicenseServer\Http\Controllers\Api;

use Illuminate\Http\Request;
use MicroweberPackages\Modules\LicenseServer\Http\Controllers\ApiBaseController;
use MicroweberPackages\Modules\LicenseServer\Models\License;

class LegacyLicenseController extends ApiBaseController
{
    public function validateLegacy(Request $request)
    {
        $localKey = $request->get('local_key', false);
        $relType = $request->get('rel_type', false);

        if (!$localKey) {
            return $this->respondWithError('Invalid local key');
        }

        if (!$relType) {
            return $this->respondWithError('Invalid rel type');
        }

        $findLicense = License::where('license_key', $localKey)->first();
        if (!$findLicense) {
            return $this->respondWithError('Invalid license key');
        }

        $registeredName = '';
        $relName = '';

        if ($findLicense->user_id > 0) {
            $registeredName = user_name($findLicense->user_id);
        }

        return response()->json([
            $relType => [
                'rel_type' => $relType,
                'status' => $findLicense->status,
                'local_key_hash' => md5($findLicense->license_key),
                'registered_name' => $registeredName,
                'rel_name' => $relName,
                'reg_on' => $findLicense->created_at,
                'due_on' => $findLicense->expiration_date,
                'billing_cycle' => 'Monthly',
                'product_id' => '',
                'service_id' => '',
            ]
        ]);


    }

    public function respondWithError($message = false)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ]);
    }

}
