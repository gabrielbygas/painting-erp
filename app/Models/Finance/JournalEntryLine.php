<?php

declare(strict_types=1);

namespace App\Models\Finance;

use App\Models\BaseModel;
use App\Models\Finance\FinancialAccount;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JournalEntryLine extends BaseModel
{
    protected $fillable = [
        'journal_entry_id',
        'financial_account_id',
        'debit',
        'credit',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'debit' => 'decimal:2',
            'credit' => 'decimal:2',
        ];
    }

    public function journalEntry(): BelongsTo
    {
        return $this->belongsTo(JournalEntry::class);
    }

    public function financialAccount(): BelongsTo
    {
        return $this->belongsTo(FinancialAccount::class);
    }
}