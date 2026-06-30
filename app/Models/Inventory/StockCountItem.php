<?php

declare(strict_types=1);

namespace App\Models\Inventory;

use App\Models\BaseModel;
use App\Models\Catalog\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockCountItem extends BaseModel
{
    protected $fillable = [
        'stock_count_id',
        'product_variant_id',
        'system_quantity',
        'counted_quantity',
        'difference_quantity',
    ];

    protected function casts(): array
    {
        return [
            'system_quantity' => 'decimal:3',
            'counted_quantity' => 'decimal:3',
            'difference_quantity' => 'decimal:3',
        ];
    }

    public function stockCount(): BelongsTo
    {
        return $this->belongsTo(StockCount::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}