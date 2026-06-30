<?php

declare(strict_types=1);

namespace App\Models\Customers;

use App\Models\BaseModel;
use App\Models\Core\Country;
use App\Models\Documents\Document;
use App\Models\Finance\CustomerPayment;
use App\Models\Sales\CustomerInvoice;
use App\Models\Sales\DeliveryNote;
use App\Models\Sales\Quotation;
use App\Models\Sales\SalesOrder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'country_id',
        'code',
        'name',
        'email',
        'phone',
        'tax_number',
        'credit_limit',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'credit_limit' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(CustomerAddress::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(CustomerContact::class);
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class);
    }

    public function salesOrders(): HasMany
    {
        return $this->hasMany(SalesOrder::class);
    }

    public function deliveryNotes(): HasMany
    {
        return $this->hasMany(DeliveryNote::class);
    }

    public function customerInvoices(): HasMany
    {
        return $this->hasMany(CustomerInvoice::class);
    }

    public function customerPayments(): HasMany
    {
        return $this->hasMany(CustomerPayment::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}