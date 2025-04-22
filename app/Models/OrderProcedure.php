<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProcedure extends Model
{
    protected $table = 'order_procedures';
    protected $fillable = ['procedure_id', 'order_id', 'tooth_number', 'color_id', 'user_id'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function procedure(): BelongsTo
    {
        return $this->belongsTo(Procedure::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function steps()
    {
        return $this->hasMany(OrderProcedureStep::class, 'order_id')
            ->where('procedure_id', $this->procedure_id);
    }
}
