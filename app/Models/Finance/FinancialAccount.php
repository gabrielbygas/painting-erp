<?php

declare(strict_types=1);

namespace App\Models\Finance;

use App\Models\BaseModel;
use App\Models\Core\Currency;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinancialAccount extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'type',
        'currency_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function journalEntryLines(): HasMany
    {
        return $this->hasMany(JournalEntryLine::class);
    }
}