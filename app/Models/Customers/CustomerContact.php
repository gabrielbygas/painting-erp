<?php

declare(strict_types=1);

namespace App\Models\Customers;

use App\Models\BaseModel;
use App\Models\Core\JobTitle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerContact extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'job_title_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'mobile',
        'is_primary',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }
}