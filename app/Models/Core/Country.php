<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Models\BaseModel;
use App\Models\Customers\Customer;
use App\Models\Settings\Company;
use App\Models\Suppliers\Supplier;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'phone_code',
        'currency_code',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function suppliers(): HasMany
    {
        return $this->hasMany(Supplier::class);
    }
}