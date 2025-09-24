<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait BelongsToHouseOwner
{
    public static function bootBelongsToHouseOwner(): void
    {
        static::addGlobalScope('house_owner', function (Builder $builder) {
            $user = Auth::user();
            if ($user && $user->role === 'owner') {
                $builder->where($builder->getModel()->getTable() . '.house_owner_id', $user->id);
            }
        });
    }

    public function scopeForOwner(Builder $query, int $ownerId): Builder
    {
        return $query->where($this->getTable() . '.house_owner_id', $ownerId);
    }
}


