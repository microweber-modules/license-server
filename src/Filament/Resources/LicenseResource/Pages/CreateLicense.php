<?php

namespace MicroweberPackages\Modules\LicenseServer\Filament\Resources\LicenseResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use MicroweberPackages\Modules\LicenseServer\Filament\Resources\LicenseResource;

class CreateLicense extends CreateRecord
{
    protected static string $resource = LicenseResource::class;
}
