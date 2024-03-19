<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const NORMAL_USER = 'normal_user';
    const EXPERT = 'expert';
    const ADMIN = 'admin';

    const USER_TYPE = [
        'normal_user' => 'Normal User',
        'expert' => 'Expert',
        'admin' => 'Admin'
    ];

    const APPROVED = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
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
    ];

    public function scopeIsExpert($query){
        return $query->where('user_type', self::EXPERT);
    }
    public function scopeIsApproved($query){
        return $query->where('is_approved', self::APPROVED);
    }
}
