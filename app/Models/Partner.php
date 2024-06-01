<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Partner extends Authenticatable
{
    use HasFactory;

    protected $table = 'partners';

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'dob',
        'is_active',
        'hash',
        'phone',
    ];
}
