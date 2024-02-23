<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Foundation\Auth\User;
use Laravel\Passport\HasApiTokens;

class Seller extends Model implements Authenticatable
{
    use HasFactory,AuthenticatableTrait,HasApiTokens;

    protected $fillable = [
        'company_name',
        'approved',
        'role',
        'gst_no',
        'phone',
        'address',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
