<?php

namespace LaravelReady\UltimateSupport\Supports;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use LaravelReady\UltimateSupport\Exceptions\IpAddressNotFoundException;

class IpSupport
{
    /**
     * Check client is from localhost
     *
     * @source https://stackoverflow.com/a/21702853/6940144
     *
     * @return bool
     */
    public static function isLocalhost(): bool
    {
        return in_array(request()->ip(), ['127.0.0.1', '::1', '172.27.0.1']);
    }

    /**
     * Get client public IP address if it is localhost
     *
     * @return null | string
     */
    public static function getPublicIp(): null | string
    {
        $isCacheable = Config::get('ultimate-support.ip.use_cache_for_local_public_ip', true);
        $cacheKey = 'ultimate-support:ip:local_public_ip';

        if ($isCacheable) {
            if (Cache::has($cacheKey)) {
                $ipAddress = Cache::get($cacheKey, null);

                if ($ipAddress !== null) {
                    return $ipAddress;
                }
            }
        }

        $response = Http::withoutVerifying()->get('https://api.ipify.org/?format=json');

        if ($response->ok()) {
            $ipAddress = $response->json()['ip'] ?? null;

            if ($ipAddress && filter_var($ipAddress, FILTER_VALIDATE_IP)) {
                if ($isCacheable) {
                    Cache::put($cacheKey, $ipAddress, now()->addDay());
                }

                return $ipAddress;
            }

            return $ipAddress;
        }
    }

    /**
     * Get client real IP address
     *
     * @source https://stackoverflow.com/q/13646690/6940144
     *
     * @param bool $getLocalPublicIp
     *
     * @return string
     */
    public static function getIpAddress(bool $getLocalPublicIp = false): null | array
    {
        $baseIpAddress = request()->ip();

        try {
            // get localhost public ip
            if (($getLocalPublicIp || Config::get('ultimate-support.ip.get_local_public_ip')) && self::isLocalhost()) {
                return [
                    'is_local' => true,
                    'base_ip' => $baseIpAddress,
                    'ip_address' => self::getPublicIp(),
                ];
            }

            $ipAddress = $baseIpAddress;

            // check other conditions, cloudflare etc
            if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && filter_var($_SERVER['HTTP_CF_CONNECTING_IP'], FILTER_VALIDATE_IP)) {
                $ipAddress = $_SERVER['HTTP_CF_CONNECTING_IP'];
            } elseif (isset($_SERVER['HTTP_X_REAL_IP']) && filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
                $ipAddress = $_SERVER['HTTP_X_REAL_IP'];
            } elseif (isset($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
                $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }

            return [
                'is_local' => true,
                'base_ip' => $baseIpAddress,
                'ip_address' => $ipAddress
            ];
        } catch (Exception $exp) {
            if (Config::get('ultimate-support.ip.get_local_public_ip')) {
                Log::alert('Ultimate Support: getIP error', ['error' => $exp]);
            }

            throw new IpAddressNotFoundException($exp);
        }

        return $baseIpAddress;
    }
}
