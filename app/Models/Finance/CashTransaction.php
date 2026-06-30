<?php

declare(strict_types=1);

namespace App\Models\Finance;

use App\Models\BaseModel;
use App\Models\Core\PaymentMethod;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CashTransaction extends BaseModel
{
    protected $fillable = [
        'cash_account_id',
        'payment_method_id',
        'amount',
        'type',
        'transaction_date',
        'reference',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'transaction_date' => 'date',
        ];
    }

    public function cashAccount(): BelongsTo
    {
        return $this->belongsTo(CashAccount::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}