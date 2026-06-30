<?php

declare(strict_types=1);

namespace App\Models\Documents;

use App\Models\Administration\User;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocumentComment extends BaseModel
{
    protected $fillable = [
        'document_id',
        'user_id',
        'comment',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}