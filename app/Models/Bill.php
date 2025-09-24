<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    use \App\Models\Traits\BelongsToHouseOwner;

    protected $fillable = [
        'flat_id',
        'bill_category_id',
        'house_owner_id',
        'month',
        'amount',
        'due_carried_forward',
        'status',
        'notes',
    ];

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function category()
    {
        return $this->belongsTo(BillCategory::class, 'bill_category_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'house_owner_id');
    }
}


