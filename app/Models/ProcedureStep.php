<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProcedureStep extends Model
{
    protected $fillable = ['procedure_id', 'name', 'description', 'sort_order'];

    public function procedure(): BelongsTo
    {
        return $this->belongsTo(Procedure::class);
    }

    public function stepUsers(): HasMany
    {
        return $this->hasMany(StepUser::class, 'step_id');
    }

    public function orderSteps(): HasMany
    {
        return $this->hasMany(OrderProcedureStep::class, 'step_id');
    }
}
