<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = '';

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
