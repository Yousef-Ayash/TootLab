<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProcedure extends Model
{
    protected $table = 'order_procedures';
    protected $fillable = ['procedure_id', 'order_id', 'tooth_number', 'color_id'];

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
}
