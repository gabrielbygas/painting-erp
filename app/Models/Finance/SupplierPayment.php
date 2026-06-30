<?php

declare(strict_types=1);

namespace App\Models\Finance;

use App\Models\BaseModel;
use App\Models\Core\Currency;
use App\Models\Purchasing\SupplierInvoice;
use App\Models\Core\PaymentMethod;
use App\Models\Suppliers\Supplier;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplierPayment extends BaseModel
{
    protected $fillable = [
        'supplier_id',
        'supplier_invoice_id',
        'payment_method_id',
        'currency_id',
        'amount',
        'payment_date',
        'reference',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'payment_date' => 'date',
        ];
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function supplierInvoice(): BelongsTo
    {
        return $this->belongsTo(SupplierInvoice::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}