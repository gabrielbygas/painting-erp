<?php

declare(strict_types=1);

namespace App\Models\Core;

use App\Models\BaseModel;
use App\Models\Core\Currency;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExchangeRate extends BaseModel
{
    protected $fillable = [
        'currency_id',
        'rate',
        'effective_date',
    ];

    protected function casts(): array
    {
        return [
            'rate' => 'decimal:6',
            'effective_date' => 'date',
        ];
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}