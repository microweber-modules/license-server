# Ultimate Support

[![EgoistDeveloper Laravel Support](https://preview.dragon-code.pro/EgoistDeveloper/Ultimate-Support.svg?brand=laravel)](https://github.com/laravel-ready/ultimate-support)

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]


Support collection for Laravel. This package is standalone and does not require external packages.

## Install

Install via Composer:

```bash
composer require laravel-ready/ultimate-support
```

## Publish Config

```bash
php artisan vendor:publish --tag=ultimate-support-config
```

# Support Classes

## IpSupport

Contains methods for working with IP addresses.

`use LaravelReady\UltimateSupport\Supports\IpSupport;`

| Method | Description | Result |
| ------ | ----------- | ------ |
| **isLocalhost** | Check client is from localhost | `boolean` |
| **getPublicIp** | Get client public IP address if it is localhost | `null` or `string` |
| **getIpAddress** | Get client real IP address | `array` |

### getIpAddress Result
```php
[
  "is_local" => true, // is client from localhost
  "base_ip" => "127.0.0.1", // laravel's request()->ip()
  "ip_address" => "111.111.111.111", // real client ip
]
```

> **Warning** `getPublicIp` is uses [ipify.org](https://api.ipify.org/?format=json) service and caching results for 1 day.

> **Note** In laravel native way you can use `Request::ip()` method but this method is cover all cases. For example cloudflare, nginx, etc. Also see this stackoverflow [question](https://stackoverflow.com/q/13646690/6940144).


[badge_downloads]:      https://img.shields.io/packagist/dt/laravel-ready/ultimate-support.svg?style=flat-square

[badge_license]:        https://img.shields.io/packagist/l/laravel-ready/ultimate-support.svg?style=flat-square

[badge_stable]:         https://img.shields.io/github/v/release/laravel-ready/ultimate-support?label=stable&style=flat-square

[badge_unstable]:       https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[link_license]:         LICENSE

[link_packagist]:       https://packagist.org/packages/laravel-ready/ultimate-support

