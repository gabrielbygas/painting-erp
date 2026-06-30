<?php

declare(strict_types=1);

namespace App\Models\Documents;

use App\Models\BaseModel;
use App\Models\Documents\Document;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentSequence extends BaseModel
{
    protected $fillable = [
        'document_type_id',
        'prefix',
        'suffix',
        'next_number',
        'padding',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'next_number' => 'integer',
            'padding' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}