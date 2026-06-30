<?php

declare(strict_types=1);

namespace App\Models\Finance;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JournalEntry extends BaseModel
{
    protected $fillable = [
        'entry_date',
        'reference',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'entry_date' => 'date',
        ];
    }

    public function lines(): HasMany
    {
        return $this->hasMany(JournalEntryLine::class);
    }
}