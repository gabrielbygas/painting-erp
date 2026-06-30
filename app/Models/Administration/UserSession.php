<?php

declare(strict_types=1);

namespace App\Models\Administration;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSession extends BaseModel
{
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'device',
        'platform',
        'browser',
        'logged_in_at',
        'logged_out_at',
    ];

    protected function casts(): array
    {
        return [
            'logged_in_at' => 'datetime',
            'logged_out_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}