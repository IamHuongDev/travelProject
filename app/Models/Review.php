<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'nha_hang_khach_san_id',
        'rate',
        'content',
        'customer_id',
        'is_open',
    ];

    public function customer()
    {
        return $this->belongsTo('\App\Models\Customer','customer_id','id');
    }
}
