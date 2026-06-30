<?php

declare(strict_types=1);

namespace App\Models\Documents;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends BaseModel
{
    protected $fillable = [
        'document_type_id',
        'document_status_id',

        'document_number',
        'document_date',
        'posting_date',

        'remarks',

        'documentable_type',
        'documentable_id',
    ];

    protected function casts(): array
    {
        return [
            'document_date' => 'date',
            'posting_date' => 'date',
        ];
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function documentStatus(): BelongsTo
    {
        return $this->belongsTo(DocumentStatus::class);
    }

    public function documentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(DocumentAttachment::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(DocumentComment::class);
    }
}