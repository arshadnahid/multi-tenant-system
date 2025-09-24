<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;
    use \App\Models\Traits\BelongsToHouseOwner;

    protected $fillable = [
        'house_owner_id',
        'flat_number',
        'owner_name',
        'owner_contact',
        'owner_email',
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


