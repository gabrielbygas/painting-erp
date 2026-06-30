<?php

declare(strict_types=1);

namespace App\Models\Inventory;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StockMovementType extends BaseModel
{
    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'is_entry',
    ];

    protected function casts(): array
    {
        return [
            'is_entry' => 'boolean',
        ];
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}