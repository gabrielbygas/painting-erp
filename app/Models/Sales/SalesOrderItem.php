<?php

declare(strict_types=1);

namespace App\Models\Sales;

use App\Models\BaseModel;
use App\Models\Catalog\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesOrderItem extends BaseModel
{
    protected $fillable = [
        'sales_order_id',
        'product_variant_id',
        'quotation_id',
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

    public function salesOrder(): BelongsTo
    {
        return $this->belongsTo(SalesOrder::class);
    }

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}