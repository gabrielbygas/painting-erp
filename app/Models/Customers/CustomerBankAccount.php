<?php

declare(strict_types=1);

namespace App\Models\Customers;

use App\Models\BaseModel;
use App\Models\Core\FinancialInstitution;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerBankAccount extends BaseModel
{
    protected $fillable = [
        'customer_id',
        'financial_institution_id',
        'account_name',
        'account_number',
        'iban',
        'swift_code',
        'mobile_money_number',
        'is_default',
    ];

    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function financialInstitution(): BelongsTo
    {
        return $this->belongsTo(FinancialInstitution::class);
    }
}