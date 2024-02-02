<?php
namespace MicroweberPackages\Modules\LicenseServer\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class LicenseServerLicensedProducts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('microweber-module-license-server::livewire.admin.licensed-products', [

        ]);
    }
}
