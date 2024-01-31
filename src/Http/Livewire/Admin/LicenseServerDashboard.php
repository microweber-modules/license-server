<?php
namespace MicroweberPackages\Modules\LicenseServer\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use MicroweberPackages\Modules\LicenseServer\Models\License;
use MicroweberPackages\Modules\Newsletter\Models\NewsletterList;

class LicenseServerDashboard extends Component
{
    use WithPagination;

    public $keyword;
    public $status;
    public $orderBy;
    public $orderDir;

    protected $queryString = ['keyword', 'status', 'orderBy','orderDir'];


    public function updatedKeyword($keyword)
    {
        $this->keyword = $keyword;

        $this->gotoPage(1);
    }

    public function updatedOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        $this->gotoPage(1);
    }

    public function updatedOrderDir($orderDir)
    {
        $this->orderDir = $orderDir;

        $this->gotoPage(1);
    }

    public function updatedStatus($status)
    {
        $this->status = $status;

        $this->gotoPage(1);
    }

    public function render()
    {
        $licensesQuery = License::query();

        if (!empty($this->status)) {
            $licensesQuery->where('status', $this->status);
        }

        if (!empty($this->keyword)) {
            $licensesQuery->where('domain', 'like', '%' . $this->keyword . '%');
        }

        if (!empty($this->orderBy) && !empty($this->orderDir)) {
            $licensesQuery->orderBy($this->orderBy, $this->orderDir);
        } else {
            $licensesQuery->orderBy('id', 'desc');
        }

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
