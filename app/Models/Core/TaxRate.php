<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxRate extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'rate',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'rate' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }
}