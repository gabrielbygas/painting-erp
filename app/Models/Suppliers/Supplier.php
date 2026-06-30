<?php

declare(strict_types=1);

namespace App\Models\Suppliers;

use App\Models\BaseModel;
use App\Models\Core\Country;
use App\Models\Documents\Document;
use App\Models\Finance\SupplierPayment;
use App\Models\Purchasing\PurchaseOrder;
use App\Models\Purchasing\PurchaseReceipt;
use App\Models\Purchasing\PurchaseRequest;
use App\Models\Purchasing\PurchaseReturn;
use App\Models\Purchasing\SupplierInvoice;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'country_id',
        'code',
        'name',
        'email',
        'phone',
        'tax_number',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(SupplierAddress::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(SupplierContact::class);
    }

    public function purchaseRequests(): HasMany
    {
        return $this->hasMany(PurchaseRequest::class);
    }

    public function purchaseOrders(): HasMany
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function purchaseReceipts(): HasMany
    {
        return $this->hasMany(PurchaseReceipt::class);
    }

    public function supplierInvoices(): HasMany
    {
        return $this->hasMany(SupplierInvoice::class);
    }

    public function purchaseReturns(): HasMany
    {
        return $this->hasMany(PurchaseReturn::class);
    }

    public function supplierPayments(): HasMany
    {
        return $this->hasMany(SupplierPayment::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}