<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProcedureStep extends Model
{
    protected $fillable = ['order_id', 'procedure_id', 'step_id', 'user_id', 'is_done'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function procedure(): BelongsTo
    {
        return $this->belongsTo(Procedure::class);
    }

    public function step(): BelongsTo
    {
        return $this->belongsTo(ProcedureStep::class, 'step_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
