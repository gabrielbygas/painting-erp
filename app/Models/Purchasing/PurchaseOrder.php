<?php

declare(strict_types=1);

namespace App\Models\Purchasing;

use App\Models\BaseModel;
use App\Models\Core\Currency;
use App\Models\Purchasing\PurchaseReceipt;
use App\Models\Purchasing\PurchaseOrderItem;
use App\Models\Documents\Document;
use App\Models\Suppliers\Supplier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrder extends BaseModel
{
    protected $fillable = [
        'document_id',
        'supplier_id',
        'currency_id',
        'subtotal',
        'discount_amount',
        'tax_amount',
        'total_amount',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'discount_amount' => 'decimal:2',
            'tax_amount' => 'decimal:2',
            'total_amount' => 'decimal:2',
        ];
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function receipts(): HasMany
    {
        return $this->hasMany(PurchaseReceipt::class);
    }
}