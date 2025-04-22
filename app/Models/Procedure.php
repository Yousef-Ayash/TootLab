<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Procedure extends Model
{
    protected $fillable = ['name', 'description', 'cost', 'color_id'];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(ProcedureStep::class);
    }

    public function orderProcedures(): HasMany
    {
        return $this->hasMany(OrderProcedure::class);
    }
}
