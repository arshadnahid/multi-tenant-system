<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [

        'house_owner_id',
        'name',
        'contact',
        'email',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'house_owner_id');
    }
}


