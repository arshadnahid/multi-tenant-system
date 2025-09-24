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
        'referred_by',
        'provider',
        'provider_id',
        'refresh_token',
        'access_token',
        'user_type',
        'user_name',
        'name',
        'last_name',
        'email',
        'notification_preferences',
        'email_verification_token',
        'verification_token_expire_at',
        'verification_code',
        'new_email_verificiation_code',
        'news_letter',
        'terms_conditions',
        'password',
        'remember_token',
        'device_token',
        'avatar',
        'avatar_original',
        'address',
        'country',
        'state',
        'city',
        'postal_code',
        'country_code',
        'phone',
        'balance',
        'banned',
        'referral_code',
        'customer_package_id',
        'remaining_uploads',
        'two_factor_enabled',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'two_factor_enabled_at',
        'two_factor_last_used_at',
        'password_changed_at',
        'notify_on_new_login',
        'notify_on_password_change',
        'notify_on_security_alert',
        'session_timeout',
        'allowed_ips',
        'is_active',
        'deactivated_at',
        'scheduled_for_deletion',
        'deletion_scheduled_at',
        'deletion_reason',
        'bio',
        'date_of_birth',
        'gender',
        'language',
        'timezone',
        'wishlist_migrated_to_v3',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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
     public function products()
    {
        return $this->hasMany(Product::class);
    }
}
