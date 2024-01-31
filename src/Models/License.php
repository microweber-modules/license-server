<?php

namespace MicroweberPackages\Modules\LicenseServer\Models;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

use MicroweberPackages\Modules\LicenseServer\Traits\Licensable;

use App\Models\User;

class License extends Model
{
    use HasApiTokens, SoftDeletes, Licensable;

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->created_by = auth()->id();
        });
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    protected $table = 'ls_licenses';

    protected $fillable = [
        'user_id',
        'created_by',
        'domain',
        'license_key',
        'status',
        'expiration_date',
        'is_trial',
        'is_lifetime',
    ];

    protected $casts = [
        'is_trial' => 'boolean',
        'is_lifetime' => 'boolean',
        'expiration_date' => 'datetime',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'expires_in',
    ];

    public function getExpiresInAttribute()
    {
        if ($this->expiration_date < now()) {
            return 0;
        }

        return Carbon::now()->diffInDays($this->expiration_date);
    }

    public function getStatusAttribute($value)
    {
        if ($this->expiration_date < now()) {
            return 'expired';
        }

        return $value;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ipAddress(): HasOne
    {
        return $this->hasOne(IpAddress::class);
    }

    public function getLicenseKeyMaskedAttribute()
    {
        return Str::mask($this->license_key, '*', -20, 13);
    }

}
