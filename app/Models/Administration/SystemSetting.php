<?php

declare(strict_types=1);

namespace App\Models\Administration;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemSetting extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'key',
        'value',
        'group',
        'description',
        'is_public',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'array',
            'is_public' => 'boolean',
        ];
    }
}