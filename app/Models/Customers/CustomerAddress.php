<?php

declare(strict_types=1);

namespace App\Models\Customers;

use App\Models\BaseModel;
use App\Models\Core\AddressType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerAddress extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'address_type_id',
        'address_line_1',
        'address_line_2',
        'city',
        'postal_code',
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

    public function addressType(): BelongsTo
    {
        return $this->belongsTo(AddressType::class);
    }
}