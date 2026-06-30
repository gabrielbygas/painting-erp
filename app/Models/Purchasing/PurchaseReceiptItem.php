<?php

declare(strict_types=1);

namespace App\Models\Purchasing;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseReceiptItem extends BaseModel
{
    protected $fillable = [
        'purchase_receipt_id',
        'purchase_order_item_id',
        'received_quantity',
    ];

    protected function casts(): array
    {
        return [
            'received_quantity' => 'decimal:3',
        ];
    }

    public function purchaseReceipt(): BelongsTo
    {
        return $this->belongsTo(PurchaseReceipt::class);
    }

    public function purchaseOrderItem(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrderItem::class);
    }
}