<?php

declare(strict_types=1);

namespace App\Models\Sales;

use App\Models\BaseModel;
use App\Models\Core\Currency;
use App\Models\Sales\SalesOrderItem;
use App\Models\Sales\DeliveryNote;
use App\Models\Customers\Customer;
use App\Models\Documents\Document;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalesOrder extends BaseModel
{
    protected $fillable = [
        'document_id',
        'customer_id',
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

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(SalesOrderItem::class);
    }

    public function deliveryNotes(): HasMany
    {
        return $this->hasMany(DeliveryNote::class);
    }
}