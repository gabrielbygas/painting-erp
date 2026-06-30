<?php

declare(strict_types=1);

namespace App\Models\Purchasing;

use App\Models\BaseModel;
use App\Models\Documents\Document;
use App\Models\Purchasing\PurchaseReceiptItem;
use App\Models\Infrastructure\Warehouse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseReceipt extends BaseModel
{
    protected $fillable = [
        'document_id',
        'purchase_order_id',
        'warehouse_id',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PurchaseReceiptItem::class);
    }
}