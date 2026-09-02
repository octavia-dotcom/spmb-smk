<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id_user'; // PAKE INI KALO PRIMARY KEY KAMU id_users
    public $incrementing = true; // TAMBAH INI
    protected $keyType = 'int'; // TAMBAH INI
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'no_hp'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 10+ auto hash
    ];
}