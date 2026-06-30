<?php

declare(strict_types=1);

namespace App\Models\Documents;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentAttachment extends BaseModel
{
    protected $fillable = [
        'document_id',
        'file_name',
        'original_name',
        'mime_type',
        'file_size',
        'path',
    ];

    protected function casts(): array
    {
        return [
            'file_size' => 'integer',
        ];
    }

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }
}