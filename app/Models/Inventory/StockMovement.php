<?php

declare(strict_types=1);

namespace App\Models\Inventory;

use App\Models\Administration\User;
use App\Models\BaseModel;
use App\Models\Inventory\StockMovementType;
use App\Models\Catalog\Product;
use App\Models\Catalog\ProductVariant;
use App\Models\Infrastructure\Warehouse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockMovement extends BaseModel
{
    protected $fillable = [
        'warehouse_id',
        'product_id',
        'product_variant_id',
        'user_id',
        'stock_movement_type_id',
        'quantity',
        'reference_type',
        'reference_id',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:2',
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function stockMovementType(): BelongsTo
    {
        return $this->belongsTo(StockMovementType::class);
    }
}