<?php

namespace MicroweberPackages\Modules\LicenseServer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MicroweberPackages\Modules\LicenseServer\Traits\Licensable;
use MicroweberPackages\Product\Models\Product;

class ExtendedProduct extends Product
{
    use Licensable;
    use HasFactory;
}
