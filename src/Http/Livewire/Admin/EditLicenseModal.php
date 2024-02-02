<?php

namespace MicroweberPackages\Modules\Panel\Http\Livewire\User;

use LivewireUI\Modal\ModalComponent;
use MicroweberPackages\Modules\LicenseServer\Models\License;
use MicroweberPackages\Modules\Panel\Models\Website;
use MicroweberPackages\Modules\Panel\Models\WebsiteServerPlan;
use MicroweberPackages\Modules\Panel\Server\Providers\Structures\ServerAccount;
use MicroweberPackages\Modules\Panel\Server\Providers\Structures\ServerPlan;
use MicroweberPackages\Modules\Panel\Server\ServerManager;
use MicroweberPackages\Modules\Panel\Models\WebsiteServer;
use MicroweberPackages\User\Models\User;

class EditLicenseModal extends ModalComponent
{
    public $licenseId = [];
    public $name = '';

    public function mount()
    {
        $findLicense = License::where('id', $this->licenseId)->first();
        if ($findLicense) {
            $this->name = $findLicense->name;
        }
    }

    public function render()
    {
        return view('microweber-module-license-server::livewire.modals.edit-license-modal');
    }

}
