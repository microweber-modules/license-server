<?php

namespace MicroweberPackages\Modules\LicenseServer\Http\Controllers\Api;

use Illuminate\Http\Request;
use MicroweberPackages\Modules\LicenseServer\Http\Controllers\ApiBaseController;
use MicroweberPackages\Modules\LicenseServer\Models\IpAddress;
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

        $ipAddress = IpAddress::where('license_id', $findLicense->id)->first();
        $serverIpAddress = user_ip();

        if (!$ipAddress) {
            $ipAddress = IpAddress::create([
                'license_id' => $findLicense->id,
                'ip_address' => $serverIpAddress,
            ]);
        }

        if ($ipAddress && $ipAddress->ip_address == $serverIpAddress) {

            $email = '';
            $registeredName = '';
            $relName = '';

            $licensed = $findLicense->licensed()->first();
            if ($licensed) {
                $relName = content_title($licensed->licensable_id);
            }

            if ($findLicense->user_id > 0) {
                $email = user_email($findLicense->user_id);
                $registeredName = user_name($findLicense->user_id);
            }

            return response()->json([
                $relType => [
                    'rel_type' => $relType,
                    'status' => ucfirst($findLicense->status),
                    'local_key_hash' => md5($findLicense->license_key),
                    'registered_name' => $registeredName,
                    'registeredname' => $registeredName,
                    'email' => $email,
                    'rel_name' => $relName,
                    'reg_on' => $findLicense->created_at,
                    'due_on' => $findLicense->expiration_date,
                    'billing_cycle' => 'Monthly',
                    'productid' => 0,
                    'serviceid' => 0,
                ]
            ]);
        }

        return $this->respondWithError('The IP address '.$serverIpAddress.' is not allowed. Please contact the license provider.');

    }

    public function respondWithError($message = false)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ]);
    }

}
