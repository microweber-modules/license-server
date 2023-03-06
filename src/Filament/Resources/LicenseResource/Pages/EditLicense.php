<?php

namespace MicroweberPackages\Modules\LicenseServer\Filament\Resources\LicenseResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use MicroweberPackages\Modules\LicenseServer\Filament\Resources\LicenseResource;

class EditLicense extends EditRecord
{
    protected static string $resource = LicenseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
