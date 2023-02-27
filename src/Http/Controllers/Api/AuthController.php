<?php

namespace MicroweberPackages\Modules\LicenseServer\Http\Controllers\Api;

use Illuminate\Http\Request;

use MicroweberPackages\Modules\LicenseServer\Models\IpAddress;
use LaravelReady\UltimateSupport\Support\IpSupport;
use MicroweberPackages\Modules\LicenseServer\Services\LicenseService;
use MicroweberPackages\Modules\LicenseServer\Http\Controllers\ApiBaseController;

class AuthController extends ApiBaseController
{
    /**
     * Login with sanctum
     *
     * @param Request $request
     * @return Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'license_key' => 'required|string|uuid',
        ]);

        $domain = $request->input('ls_domain');
        $licenseKey = $request->input('license_key');

        $license = LicenseService::getLicenseByDomain($domain, $licenseKey);

        if ($license) {
            $license->tokens()->where('name', $domain)->delete();

            $ipAddress = IpAddress::where('license_id', $license->id)->first();
            $serverIpAddress = IpSupport::getIP();

            if (!$ipAddress) {
                $ipAddress = IpAddress::create([
                    'license_id' => $license->id,
                    'ip_address' => $serverIpAddress,
                ]);
            }

            if ($ipAddress && $ipAddress->ip_address == $serverIpAddress) {
                $licenseAccessToken = $license->createToken($domain, ['license-access']);

                return [
                    'status' => true,
                    'message' => 'Successfully logged in.',
                    'access_token' => explode('|', $licenseAccessToken->plainTextToken)[1],
                ];
            }

            return response([
                'status' => false,
                'message' => 'This IP address is not allowed. Please contact the license provider.',
            ], 401);
        }

        return response([
            'status' => false,
            'message' => 'Invalid license key or lincese source.',
        ], 401);
    }
}
