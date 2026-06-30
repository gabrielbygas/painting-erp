<?php

declare(strict_types=1);

namespace App\Models\Documents;

use App\Models\BaseModel;
use App\Models\Documents\Document;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentStatus extends BaseModel
{
    protected $fillable = [
        'code',
        'name_fr',
        'name_en',
        'color',
        'is_final',
    ];

    protected function casts(): array
    {
        return [
            'is_final' => 'boolean',
        ];
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}