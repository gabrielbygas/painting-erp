<?php

declare(strict_types=1);

namespace App\Models\Purchasing;

use App\Models\BaseModel;
use App\Models\Documents\Document;
use App\Models\Purchasing\PurchaseReturnItem;
use App\Models\Suppliers\Supplier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseReturn extends BaseModel
{
    protected $fillable = [
        'document_id',
        'supplier_id',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }
}