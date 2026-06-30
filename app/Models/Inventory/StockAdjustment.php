<?php

declare(strict_types=1);

namespace App\Models\Inventory;

use App\Models\Administration\User;
use App\Models\BaseModel;
use App\Models\Infrastructure\Warehouse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockAdjustment extends BaseModel
{
    protected $fillable = [
        'warehouse_id',
        'user_id',
        'reason',
        'notes',
    ];

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}