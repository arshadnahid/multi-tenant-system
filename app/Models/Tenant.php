<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'assigned_building_id',
        'house_owner_id',
        'name',
        'contact',
        'email',
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'assigned_building_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'house_owner_id');
    }
}


