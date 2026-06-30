<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Models\BaseModel;
use App\Models\Catalog\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'hex_code',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}