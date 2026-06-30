<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobTitle extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'description',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}