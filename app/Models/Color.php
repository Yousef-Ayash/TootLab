<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Color extends Model
{
    protected $fillable = ['name', 'hex_code'];

    public function procedures(): HasMany
    {
        return $this->hasMany(Procedure::class);
    }

    public function orderProcedures(): HasMany
    {
        return $this->hasMany(OrderProcedure::class);
    }
}
