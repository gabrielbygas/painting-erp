<?php

declare(strict_types=1);

namespace App\Models\Purchasing;

use App\Models\BaseModel;
use App\Models\Core\Currency;
use App\Models\Purchasing\SupplierInvoiceItem;
use App\Models\Documents\Document;
use App\Models\Suppliers\Supplier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierInvoice extends BaseModel
{
    protected $fillable = [
        'document_id',
        'supplier_id',
        'currency_id',
        'subtotal',
        'tax_amount',
        'total_amount',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
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
        return $this->hasMany(SupplierInvoiceItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(\App\Models\Finance\SupplierPayment::class);
    }
}