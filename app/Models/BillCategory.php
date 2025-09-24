<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillCategory extends Model
{
    use HasFactory;
    use \App\Models\Traits\BelongsToHouseOwner;

    protected $fillable = [
        'house_owner_id',
        'name',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'house_owner_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}


