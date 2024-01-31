<?php
namespace MicroweberPackages\Modules\LicenseServer\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use MicroweberPackages\Modules\LicenseServer\Models\License;
use MicroweberPackages\Modules\Newsletter\Models\NewsletterList;

class LicenseServerDashboard extends Component
{
    use WithPagination;

    public function render()
    {
        $licensesQuery = License::query();

        $licenses = $licensesQuery->paginate(10);

        return view('microweber-module-license-server::livewire.admin.dashboard', [
            'licenses' => $licenses,
            'totalLicensesCount' => License::count(),
            'activeLicensesCount' => License::where('status', 'active')->count(),
            'expiredLicensesCount' => License::where('status', 'expired')->count(),
            'lifetimeLicensesCount' => License::where('status', 'active')->where('is_lifetime',1)->count(),
        ]);
    }
}
