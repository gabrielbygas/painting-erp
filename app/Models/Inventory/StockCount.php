<?php

declare(strict_types=1);

namespace App\Models\Inventory;

use App\Models\Administration\User;
use App\Models\BaseModel;
use App\Models\Infrastructure\Warehouse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockCount extends BaseModel
{
    protected $fillable = [
        'warehouse_id',
        'user_id',
        'count_date',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'count_date' => 'date',
        ];
    }

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}