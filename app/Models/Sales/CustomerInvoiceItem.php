<?php

declare(strict_types=1);

namespace App\Models\Sales;

use App\Models\BaseModel;
use App\Models\Catalog\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerInvoiceItem extends BaseModel
{
    protected $fillable = [
        'customer_invoice_id',
        'product_variant_id',
        'quantity',
        'unit_price',
        'line_total',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:3',
            'unit_price' => 'decimal:2',
            'line_total' => 'decimal:2',
        ];
    }

    public function customerInvoice(): BelongsTo
    {
        return $this->belongsTo(CustomerInvoice::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}