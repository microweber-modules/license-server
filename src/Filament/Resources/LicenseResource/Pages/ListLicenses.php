<?php

namespace MicroweberPackages\Modules\LicenseServer\Filament\Resources\LicenseResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use MicroweberPackages\Modules\LicenseServer\Filament\Resources\LicenseResource;

class ListLicenses extends ListRecords
{
    protected static string $resource = LicenseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
