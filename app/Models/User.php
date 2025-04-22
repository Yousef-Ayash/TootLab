<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    protected $fillable = ['username', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function stepAssignments(): HasMany
    {
        return $this->hasMany(StepUser::class);
    }

    public function procedureSteps(): HasMany
    {
        return $this->hasMany(OrderProcedureStep::class);
    }

    /** Steps assigned to this employee */
    public function qualifiedSteps(): BelongsToMany
    {
        return $this->belongsToMany(
            ProcedureStep::class,
            'procedure_step_user',
            'user_id',
            'procedure_step_id'
        )->withTimestamps();
    }
}
