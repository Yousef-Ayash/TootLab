<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StepUser extends Model
{
    protected $fillable = ['step_id', 'user_id'];

    public function step(): BelongsTo
    {
        return $this->belongsTo(ProcedureStep::class, 'step_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
