<?php

declare(strict_types=1);

namespace App\Models\Inventory;

use App\Models\BaseModel;
use App\Models\Catalog\Product;
use App\Models\Catalog\ProductVariant;
use App\Models\Infrastructure\Warehouse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends BaseModel
{
    protected $fillable = [
        'warehouse_id',
        'product_id',
        'product_variant_id',
        'quantity',
        'reserved_quantity',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:2',
            'reserved_quantity' => 'decimal:2',
        ];
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}