<?php

declare(strict_types=1);

namespace App\Models\Purchasing;

use App\Models\BaseModel;
use App\Models\Documents\Document;
use App\Models\Purchasing\PurchaseRequestItem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseRequest extends BaseModel
{
    protected $fillable = [
        'document_id',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PurchaseRequestItem::class);
    }
}