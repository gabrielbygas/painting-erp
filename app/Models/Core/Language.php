<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'native_name',
        'locale',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}