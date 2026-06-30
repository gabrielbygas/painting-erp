<?php

declare(strict_types=1);

namespace App\Models\Inventory;

use App\Models\Administration\User;
use App\Models\BaseModel;
use App\Models\Infrastructure\Warehouse;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockTransfer extends BaseModel
{
    protected $fillable = [
        'source_warehouse_id',
        'destination_warehouse_id',
        'user_id',
        'status',
        'notes',
    ];

    public function sourceWarehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'source_warehouse_id');
    }

    public function destinationWarehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'destination_warehouse_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}