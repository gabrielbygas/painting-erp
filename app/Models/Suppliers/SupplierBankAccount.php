<?php

declare(strict_types=1);

namespace App\Models\Suppliers;

use App\Models\BaseModel;
use App\Models\Core\FinancialInstitution;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupplierBankAccount extends BaseModel
{
    protected $fillable = [
        'supplier_id',
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

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function financialInstitution(): BelongsTo
    {
        return $this->belongsTo(FinancialInstitution::class);
    }
}