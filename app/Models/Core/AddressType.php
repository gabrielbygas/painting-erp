<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressType extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'is_default',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}