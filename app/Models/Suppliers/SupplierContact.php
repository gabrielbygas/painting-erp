<?php

declare(strict_types=1);

namespace App\Models\Suppliers;

use App\Models\BaseModel;
use App\Models\Core\JobTitle;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupplierContact extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'supplier_id',
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

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }
}