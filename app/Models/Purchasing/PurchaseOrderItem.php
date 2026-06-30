<?php

declare(strict_types=1);

namespace App\Models\Purchasing;

use App\Models\BaseModel;
use App\Models\Catalog\ProductVariant;
use App\Models\Purchasing\PurchaseReceiptItem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrderItem extends BaseModel
{
    protected $fillable = [
        'purchase_order_id',
        'product_variant_id',
        'quantity',
        'unit_price',
        'discount_amount',
        'line_total',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:3',
            'unit_price' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'line_total' => 'decimal:2',
        ];
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function receiptItems(): HasMany
    {
        return $this->hasMany(PurchaseReceiptItem::class);
    }
}