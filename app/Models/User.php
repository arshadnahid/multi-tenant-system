<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'building_name',
        'building_address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin(): bool
    {
        return ($this->role ?? null) === 'admin';
    }

    public function isOwner(): bool
    {
        return ($this->role ?? null) === 'owner';
    }

    public function isTenant(): bool
    {
        return ($this->role ?? null) === 'tenant';
    }
    // Buildings removed; building fields live on users table now

    public function flats()
    {
        return $this->hasMany(Flat::class, 'house_owner_id');
    }

    public function billCategories()
    {
        return $this->hasMany(BillCategory::class, 'house_owner_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'house_owner_id');
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class, 'house_owner_id');
    }
}
