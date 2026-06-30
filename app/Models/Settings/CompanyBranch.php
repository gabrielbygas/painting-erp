<?php

declare(strict_types=1);

namespace App\Models\Settings;

use App\Models\Administration\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyBranch extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'code',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}