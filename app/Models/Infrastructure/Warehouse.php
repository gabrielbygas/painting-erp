<?php

declare(strict_types=1);

namespace App\Models\Infrastructure;

use App\Models\BaseModel;
use App\Models\Inventory\Stock;
use App\Models\Inventory\StockAdjustment;
use App\Models\Inventory\StockCount;
use App\Models\Inventory\StockTransfer;
use App\Models\Purchasing\PurchaseReceipt;
use App\Models\Sales\DeliveryNote;
use App\Models\Settings\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'code',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function stockCounts(): HasMany
    {
        return $this->hasMany(StockCount::class);
    }

    public function stockAdjustments(): HasMany
    {
        return $this->hasMany(StockAdjustment::class);
    }

    public function stockTransfers(): HasMany
    {
        return $this->hasMany(StockTransfer::class);
    }

    public function purchaseReceipts(): HasMany
    {
        return $this->hasMany(PurchaseReceipt::class);
    }

    public function deliveryNotes(): HasMany
    {
        return $this->hasMany(DeliveryNote::class);
    }
}