<?php

declare(strict_types=1);

namespace App\Models\Sales;

use App\Models\BaseModel;
use App\Models\Catalog\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryNoteItem extends BaseModel
{
    protected $fillable = [
        'delivery_note_id',
        'product_variant_id',
        'quantity',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'decimal:3',
        ];
    }

    public function deliveryNote(): BelongsTo
    {
        return $this->belongsTo(DeliveryNote::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}