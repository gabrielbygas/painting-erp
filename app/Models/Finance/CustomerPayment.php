<?php

declare(strict_types=1);

namespace App\Models\Finance;

use App\Models\BaseModel;
use App\Models\Core\Currency;
use App\Models\Core\PaymentMethod;
use App\Models\Customers\Customer;
use App\Models\Sales\CustomerInvoice;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerPayment extends BaseModel
{
    protected $fillable = [
        'customer_id',
        'customer_invoice_id',
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

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function customerInvoice(): BelongsTo
    {
        return $this->belongsTo(CustomerInvoice::class);
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