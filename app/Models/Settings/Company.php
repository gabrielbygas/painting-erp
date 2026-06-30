<?php

declare(strict_types=1);

namespace App\Models\Settings;

use App\Models\Administration\User;
use App\Models\BaseModel;
use App\Models\Core\Country;
use App\Models\Core\Currency;
use App\Models\Core\Language;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'country_id',
        'currency_id',
        'language_id',

        'name',
        'legal_name',

        'tax_number',

        'email',
        'phone',
        'website',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function branches(): HasMany
    {
        return $this->hasMany(CompanyBranch::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}