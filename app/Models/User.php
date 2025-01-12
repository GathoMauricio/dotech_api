<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'status_user_id',
        'rol_user_id',
        'name',
        'middle_name',
        'last_name',
        'phone',
        'email',
        'address',
        'password',
        'fcm_token',
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

    public function estatus()
    {
        return $this->belongsTo(
            'App\Models\EstatusUsuario',
            'status_user_id',
            'id'
        )
            ->withDefault();
    }

    public function rol()
    {
        return $this->belongsTo(
            'App\Models\RolUsuario',
            'rol_user_id',
            'id'
        )
            ->withDefault();
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->setTimezone('America/Mexico_City')->format('Y-m-d H:i:s');
    }
}
