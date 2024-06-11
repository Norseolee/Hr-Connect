<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AuditLog extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "action",
        "auditable_type",
        "auditable_id",
        "old_values",
        "new_values",
        "additional_details"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id", 'user_id');
    }

    public function auditable(): MorphTo
    {
        return $this->morphTo();
    }
}
